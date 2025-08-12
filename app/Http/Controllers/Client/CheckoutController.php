<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Commande;
use App\Models\CommandeProduit;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Page checkout : affiche le panier + total.
     */
    public function index(Request $request)
    {
        $cart  = session()->get('cart', []);   // [key => ['id','name','price','quantity','image','categorie','partenaire_id']]
        $total = 0;

        foreach ($cart as $item) {
            $q = (int)($item['quantity'] ?? 1);
            $p = (int)($item['price'] ?? 0);
            $total += $p * $q;
        }

        return view('client.checkout', compact('cart', 'total'));
    }

    /**
     * Soumission du checkout : valide, construit une "commande" en session,
     * et redirige vers la page de confirmation.
     */
    public function submit(Request $request)
    {
        // 1) Validation
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:100',
            'address'        => 'required|string|max:500',
            'country'        => 'required|string|max:100',
            'notes'          => 'nullable|string|max:2000',
            'payment_method' => 'required|in:momo,card,cash',
        ]);

        // 2) Récupérer le panier
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('client.cart.index')->with('error', 'Votre panier est vide.');
        }

        // 3) Calcul des totaux & enrichissement partenaires
        $total = 0;
        $lines = [];

        foreach ($cart as $line) {
            $q = (int)($line['quantity'] ?? 1);
            $p = (int)($line['price'] ?? 0);
            $subtotal = $p * $q;
            $total   += $subtotal;

            // Récupération du partenaire si disponible
            $partner = null;
            $pid = $line['partenaire_id'] ?? $line['idPartenaire'] ?? null;
            if (!empty($pid)) {
                $selects = ['id', 'nom_entreprise', 'email', 'type', 'adresse', 'siteWeb', 'statut'];

                if (Schema::hasColumn('partenaires', 'telephone')) {
                    $selects[] = 'telephone';
                } elseif (Schema::hasColumn('partenaires', 'telephone')) {
                    $selects[] = DB::raw('`telephone` as telephone');
                }

                $partner = DB::table('partenaires')
                    ->select($selects)
                    ->where('id', (int) $pid)
                    ->first();
            }

            $lines[] = [
                'id'         => $line['product_id'] ?? null,
                'name'       => $line['name'] ?? '',
                'image'      => $line['image'] ?? null,
                'categorie'  => $line['categorie'] ?? null,
                'quantity'   => $q,
                'price'      => $p,
                'subtotal'   => $subtotal,
                'partenaire' => $partner ? [
                    'id'        => $partner->id,
                    'nom'       => $partner->nom_entreprise,
                    'email'     => $partner->email ?? null,
                    'telephone' => $partner->telephone ?? null,
                    'adresse'   => $partner->adresse ?? null,
                    'site_web'  => $partner->siteWeb ?? null,
                    'type'      => $partner->type ?? null,
                    'statut'    => $partner->statut ?? null,
                ] : null,
            ];
        }

        // 4) Récupérer le client connecté
        $client = Auth::guard('client')->user();

        // 5) Transaction pour créer commande, produits et mettre à jour stock
        DB::transaction(function () use ($data, $lines, $total, $client, &$order) {
            $order = [
                'ref'            => 'CMD-' . now()->format('Ymd-His') . '-' . rand(1000, 9999),
                'created_at'     => now()->toDateTimeString(),
                'customer'       => [
                    'name'    => $data['name'],
                    'phone'   => $data['phone'],
                    'address' => $data['address'],
                    'country' => $data['country'],
                    'notes'   => $data['notes'] ?? null,
                ],
                'payment_method' => $data['payment_method'],
                'lines'          => $lines,
                'total'          => $total,
                'shipping'       => 0,
                'grand_total'    => $total,
            ];

            $commande = Commande::create([
                'ref'            => $order['ref'],
                'name'           => $data['name'],
                'phone'          => $data['phone'],
                'address'        => $data['address'],
                'country'        => $data['country'],
                'notes'          => $data['notes'] ?? null,
                'payment_method' => $data['payment_method'],
                'total'          => $total,
                'shipping'       => 0,
                'grand_total'    => $total,
                'client_id'      => $client->id,
            ]);

            foreach ($lines as $line) {
                CommandeProduit::create([
                    'commande_id'   => $commande->id,
                    'product_id'    => $line['id'],
                    'name'          => $line['name'],
                    'image'         => $line['image'],
                    'categorie'     => $line['categorie'],
                    'partenaire_id' => $line['partenaire']['id'] ?? null,
                    'quantity'      => $line['quantity'],
                    'price'         => $line['price'],
                    'subtotal'      => $line['subtotal'],
                ]);

                // Mise à jour du stock selon la catégorie
                $productId = $line['id'];
                $quantityOrdered = $line['quantity'];
                $categorie = $line['categorie'];

                switch ($categorie) {
                    case 'vol':
                        DB::table('vols')->where('id', $productId)->decrement('placesDisponibles', $quantityOrdered);
                        break;
                    case 'hebergement':
                        DB::table('hebergements')->where('id', $productId)->decrement('stock', $quantityOrdered);
                        break;
                    case 'excursion':
                        DB::table('excursions')->where('id', $productId)->decrement('stock', $quantityOrdered);
                        break;
                    case 'evenement':
                        DB::table('evenements')->where('id', $productId)->decrement('stock', $quantityOrdered);
                        break;
                }
            }
        });

        // 6) Stocker la commande en session pour confirmation
        session(['last_order' => $order]);

        // 7) Redirection vers confirmation (ne vide pas le panier ici)
        return redirect()->route('client.checkout.confirmation');
    }

    /**
     * Page de confirmation : lit "last_order" en session et affiche le récap.
     * On VIDE le panier ici (après confirmation), une seule fois.
     */
    public function confirmation(Request $request)
    {
        $order = session('last_order');
        if (!$order) {
            return redirect()->route('client.checkout')->with('error', 'Aucune commande à afficher.');
        }

        // Vider le panier APRÈS confirmation
        session()->forget('cart');

        return view('client.checkout.confirmation', compact('order'));
    }
}

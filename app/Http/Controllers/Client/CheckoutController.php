<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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

                // colonne téléphone : "telephone" ou "téléphone" ?
                if (Schema::hasColumn('partenaires', 'telephone')) {
                    $selects[] = 'telephone';
                } elseif (Schema::hasColumn('partenaires', 'téléphone')) {
                    // citer la colonne avec accent et l'aliaser en "telephone"
                    $selects[] = DB::raw('`téléphone` as telephone');
                }

                $partner = DB::table('partenaires')
                    ->select($selects)
                    ->where('id', (int) $pid)
                    ->first();
            }

            $lines[] = [
                'id'         => $line['id'] ?? null,
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
                    'telephone' => $partner->telephone ?? null, // marche dans les deux cas grâce à l’alias
                    'adresse'   => $partner->adresse ?? null,
                    'site_web'  => $partner->siteWeb ?? null,
                    'type'      => $partner->type ?? null,
                    'statut'    => $partner->statut ?? null,
                ] : null,
            ];
        }

        // 4) Construire l'objet "commande" en session (pour la page de confirmation)
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

        session(['last_order' => $order]);

        // ⚠️ NE PAS vider le panier ici si tu veux le vider "après la confirmation".
        // session()->forget('cart');

        // 5) Rediriger vers la page de confirmation
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

        // 🔥 Vider le panier APRÈS confirmation
        session()->forget('cart');

        return view('client.checkout.confirmation', compact('order'));
    }
}

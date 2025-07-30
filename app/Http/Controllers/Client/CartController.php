<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('client.cart.index', compact('cart', 'total'));
    }

    public function addToCart(Request $request)
    {
        // 1) Lire et valider le minimum
        $productId    = (int) $request->input('id');
        $name         = (string) $request->input('name');
        $price        = (int) $request->input('price');   // en centimes / entier (comme chez toi)
        $image        = (string) $request->input('image', '');
        $idPartenaire = $request->filled('idPartenaire') ? (int) $request->input('idPartenaire') : null;

        // 2) Recalculer / sécuriser le nom du partenaire côté serveur
        $nomPartenaire = null;
        if (!is_null($idPartenaire)) {
            $nomPartenaire = DB::table('partenaires')
                ->where('id', $idPartenaire)
                ->value('nom_entreprise'); // null si inexistant
            // Si l'id envoyé ne correspond à aucun partenaire, on l'ignore
            if (is_null($nomPartenaire)) {
                $idPartenaire = null;
            }
        }

        // 3) Charger le panier
        $cart = session()->get('cart', []);

        // 4) Clé de ligne : évite les collisions (même produit chez partenaires différents)
        //    Exemple: "42" devient "42-p7" si idPartenaire=7
        $lineKey = (string) $productId;
        if (!is_null($idPartenaire)) {
            $lineKey .= '-p' . $idPartenaire;
        }

        // 5) Ajouter / incrémenter
        if (isset($cart[$lineKey])) {
            $cart[$lineKey]['quantity'] += 1;
        } else {
            $cart[$lineKey] = [
                'product_id'     => $productId,
                'name'           => $name,
                'price'          => $price,
                'image'          => $image,
                'quantity'       => 1,

                // 🔹 Contexte partenaire
                'idPartenaire'   => $idPartenaire,     // peut être null
                'nomPartenaire'  => $nomPartenaire,    // peut être null
            ];
        }

        // 6) Sauvegarder
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        $quantity = (int) $request->input('quantity');

        if ($quantity <= 0) {
            // Supprimer le produit si la quantité est 0
            unset($cart[$id]);
        } else {
            // Mettre à jour la quantité si l'article existe
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        // Si c'est une requête AJAX, on renvoie une réponse JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cartCount' => count($cart),
            ]);
        }

        return redirect()->back()->with('success', 'Panier mis à jour');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier.');
    }
}

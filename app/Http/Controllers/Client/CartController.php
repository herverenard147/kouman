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
        $productId    = (int) $request->input('id');
        $name         = (string) $request->input('name');
        $price        = (int) $request->input('price');
        $image        = (string) $request->input('image', '');
        $idPartenaire = $request->filled('idPartenaire') ? (int) $request->input('idPartenaire') : null;
        $categorie    = (string) $request->input('categorie', '');

        // Vérifier le stock selon la catégorie
        $stock = null;
        switch ($categorie) {
            case 'vol':
                $stock = DB::table('vols')->where('id', $productId)->value('placesDisponibles');
                break;
            case 'hebergement':
                $stock = DB::table('hebergements')->where('id', $productId)->value('stock');
                break;
            case 'excursion':
                $stock = DB::table('excursions')->where('id', $productId)->value('stock');
                break;
            case 'evenement':
                $stock = DB::table('evenements')->where('id', $productId)->value('stock');
                break;
        }

        if ($stock !== null && $stock <= 0) {
            return redirect()->back()->with('error', 'Cet article n\'est pas disponible pour le moment.');
        }

        // Rechercher le partenaire
        $nomPartenaire = null;
        if (!is_null($idPartenaire)) {
            $nomPartenaire = DB::table('partenaires')->where('id', $idPartenaire)->value('nom_entreprise');
            if (is_null($nomPartenaire)) $idPartenaire = null;
        }

        // Gérer le panier
        $cart = session()->get('cart', []);
        $lineKey = (string) $productId;
        if (!is_null($idPartenaire)) $lineKey .= '-p' . $idPartenaire;

        $currentQty = isset($cart[$lineKey]) ? $cart[$lineKey]['quantity'] : 0;
        $maxQty     = $stock ?? PHP_INT_MAX;

        if ($currentQty + 1 > $maxQty) {
            return redirect()->back()->with('error', 'Quantité maximale atteinte pour cet article.');
        }

        if (isset($cart[$lineKey])) {
            $cart[$lineKey]['quantity'] += 1;
        } else {
            $cart[$lineKey] = [
                'product_id'     => $productId,
                'name'           => $name,
                'price'          => $price,
                'image'          => $image,
                'quantity'       => 1,
                'idPartenaire'   => $idPartenaire,
                'nomPartenaire'  => $nomPartenaire,
                'categorie'      => $categorie,
                'stock'          => $stock,  // <== ici on ajoute le stock
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $quantity = (int) $request->input('quantity');

        if (!isset($cart[$id])) {
            return redirect()->back()->with('error', 'Article introuvable dans le panier.');
        }

        $line = $cart[$id];
        $productId    = $line['product_id'] ?? null;
        $categorie    = $line['categorie'] ?? '';
        $idPartenaire = $line['idPartenaire'] ?? null;

        // Lire le stock dispo
        $stock = null;
        switch ($categorie) {
            case 'vol':
                $stock = DB::table('vols')->where('id', $productId)->value('placesDisponibles');
                break;
            case 'hebergement':
                $stock = DB::table('hebergements')->where('id', $productId)->value('stock');
                break;
            case 'excursion':
                $stock = DB::table('excursions')->where('id', $productId)->value('stock');
                break;
            case 'evenement':
                $stock = DB::table('evenements')->where('id', $productId)->value('stock');
                break;
        }

        $maxQty = $stock ?? PHP_INT_MAX;

        if ($quantity <= 0) {
            unset($cart[$id]);
        } elseif ($quantity > $maxQty) {
            return redirect()->back()->with('error', 'La quantité demandée dépasse la disponibilité.');
        } else {
            $cart[$id]['quantity'] = $quantity;
            $cart[$id]['stock'] = $maxQty; // Mise à jour du stock en session
        }

        session()->put('cart', $cart);

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

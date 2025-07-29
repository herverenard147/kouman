<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $productId = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // Le produit est déjà dans le panier, on incrémente la quantité
            $cart[$productId]['quantity'] += 1;
        } else {
            // Nouveau produit ajouté au panier
            $cart[$productId] = [
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => 1
            ];
        }

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

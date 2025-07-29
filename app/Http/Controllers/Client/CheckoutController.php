<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('client.checkout', compact('cart', 'total'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'payment_method' => 'required|in:momo,card,cash',
        ]);

        // Ici tu peux sauvegarder la commande dans la base si tu veux

        session()->forget('cart'); // Vide le panier après la commande

        return redirect()->route('client.index')->with('success', 'Commande passée avec succès !');
    }
}

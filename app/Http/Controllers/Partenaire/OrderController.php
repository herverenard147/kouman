<?php

namespace App\Http\Controllers\Partenaire;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;

class OrderController extends Controller
{
    public function index()
    {
        $partenaire = Auth::guard('partenaire')->user();

        $orders = Commande::whereHas('produits', function ($query) use ($partenaire) {
            $query->where('partenaire_id', $partenaire->id);
        })
            ->with(['produits' => function ($query) use ($partenaire) {
                $query->where('partenaire_id', $partenaire->id);
            }])
            ->latest()
            ->paginate(10);

        return view('partenaire.orders.index', compact('orders'));
    }
}

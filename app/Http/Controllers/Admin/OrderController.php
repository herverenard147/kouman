<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $commandes = Commande::with(['client', 'produits.partenaire'])->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.orders.index', compact('commandes'));
    }
}


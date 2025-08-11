<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class ClientOrderController extends Controller
{
    public function show($id)
    {
        $client = Auth::guard('client')->user();

        $order = Commande::where('id', $id)
                        ->where('client_id', $client->id)  // Sécurité : que ses propres commandes
                        ->firstOrFail();

        return view('client.orders.show', compact('order'));
    }
}

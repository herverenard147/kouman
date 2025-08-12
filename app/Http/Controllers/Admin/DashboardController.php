<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Partenaire;
use App\Models\Commande;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();

        // Comptages
        $clientsCount   = Client::count();
        $partnersCount  = Partenaire::count();
        $ordersCount    = Commande::count();

        // Revenus mensuels (mois courant)
        $monthlyRevenue = Commande::whereMonth('created_at', Carbon::now()->month)
            ->sum('grand_total');

        $stats = [
            'clients_count'   => $clientsCount,
            'partners_count'  => $partnersCount,
            'orders_count'    => $ordersCount,
            'monthly_revenue' => number_format($monthlyRevenue, 0, ',', ' ') . ' FCFA',
        ];

        return view('admin.index', compact('admin', 'stats'));
    }
}

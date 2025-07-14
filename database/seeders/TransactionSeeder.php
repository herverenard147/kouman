<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $transactions = [
            [
                'reservation_id' => 1,
                'montant' => 50000,
                'date_paiement' => now()->subDays(1),
                'mode_paiement' => 'Carte bancaire',
                'statut' => 'validée',
            ],
            [
                'reservation_id' => 2,
                'montant' => 75000,
                'date_paiement' => now(),
                'mode_paiement' => 'Mobile Money',
                'statut' => 'en attente',
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::updateOrCreate([
                'reservation_id' => $transaction['reservation_id'],
                'date_paiement' => $transaction['date_paiement'],
            ], $transaction);
        }
    }
}

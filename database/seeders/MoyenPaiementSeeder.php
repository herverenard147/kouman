<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MoyenPaiement;

class MoyenPaiementSeeder extends Seeder
{
    public function run(): void
    {
        $paiements = [
            ['nom' => 'Espèces'],
            ['nom' => 'Carte bancaire'],
            ['nom' => 'PayPal'],
            ['nom' => 'Mobile Money'],
        ];

        foreach ($paiements as $paiement) {
            MoyenPaiement::updateOrCreate(['nom' => $paiement['nom']], $paiement);
        }
    }
}


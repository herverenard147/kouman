<?php

namespace Database\Seeders;

use App\Models\PolitiquesAnnulation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolitiqueAnnulationSeeder extends Seeder
{
    public function run(): void
    {
        $politiques = [
            ['nom' => 'Flexible', 'description' => 'Annulation gratuite jusqu’à 24h avant.'],
            ['nom' => 'Modérée', 'description' => 'Annulation gratuite jusqu’à 7 jours avant.'],
            ['nom' => 'Stricte', 'description' => 'Aucun remboursement.'],
        ];

        foreach ($politiques as $p) {
            PolitiquesAnnulation::updateOrCreate(['nom' => $p['nom']], $p);
        }
    }
}

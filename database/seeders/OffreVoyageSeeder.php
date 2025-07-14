<?php

namespace Database\Seeders;

use App\Models\OffresVoyage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffreVoyageSeeder extends Seeder
{
    public function run(): void
    {
        $offres = [
            [
                'titre' => 'Séjour à Grand-Bassam',
                'description' => '4 jours de détente au bord de la plage',
                'prix' => 120000,
                'devise' => 'CFA',
                'dateDebut' => now()->addWeek(),
                'dateFin' => now()->addWeeks(2),
                'destination' => 'Grand-Bassam',
                'dureeJours' => 4,
                'statut' => 'actif',
                'idPartenaire' => 5
            ]
        ];

        foreach ($offres as $offre) {
            OffresVoyage::updateOrCreate(['titre' => $offre['titre']], $offre);
        }
    }
}

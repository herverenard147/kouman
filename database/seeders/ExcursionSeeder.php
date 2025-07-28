<?php

namespace Database\Seeders;

use App\Models\Excursion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcursionSeeder extends Seeder
{
    public function run(): void
    {
        $excursions = [
            [
                'titre' => 'Safari au parc national',
                'description' => 'Explorez la faune locale avec un guide expérimenté.',
                'prix' => 120000,
                'devise' => 'CFA',
                'duree' => 6,
                'capacite_max' => 20,
                'partenaire_id' => 1,
                'localisation_id' => 3,
                'statut' => 'brouillon',
            ],
            [
                'titre' => 'Safari au parc banco',
                'description' => 'Explorez la faune locale avec un guide expérimenté.',
                'prix' => 120000,
                'devise' => 'CFA',
                'duree' => 6,
                'capacite_max' => 20,
                'partenaire_id' => 1,
                'localisation_id' => 3,
                'statut' => 'brouillon',
            ],
        ];

        foreach ($excursions as $excursion) {
            Excursion::updateOrCreate(['titre' => $excursion['titre']], $excursion);
        }
    }
}

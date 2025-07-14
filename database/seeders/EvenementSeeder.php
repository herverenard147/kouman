<?php

namespace Database\Seeders;

use App\Models\Evenement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvenementSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'titre' => 'Festival du patrimoine',
                'description' => 'Découverte culturelle avec animations',
                'duree' => 3.5,
                'prix' => 75.00,
                'devise' => 'CFA',
                'capacite_max' => 100,
                'statut' => 'actif',
                'idPartenaire' => 7,
                'idLocalisation' => 4,
            ],
            [
                'titre' => 'Balade artistique',
                'description' => 'Exposition et peinture en plein air',
                'duree' => 1.5,
                'prix' => 45.00,
                'devise' => 'EUR',
                'capacite_max' => 30,
                'statut' => 'brouillon',
                'idPartenaire' => 6,
                'idLocalisation' => 3,
            ],
        ];

        foreach ($data as $item) {
            Evenement::updateOrCreate(['titre' => $item['titre']], $item);
        }
    }
}

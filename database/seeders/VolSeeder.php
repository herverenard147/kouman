<?php

namespace Database\Seeders;

use App\Models\Vol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolSeeder extends Seeder
{
    public function run(): void
    {
        $vols = [
            [
                'compagnie' => 'Air Afrique',
                'numeroVol' => 'AF123',
                'villeDepart' => 'Abidjan',
                'villeArrivee' => 'Paris',
                'dateDepart' => now()->addDays(3),
                'dateArrivee' => now()->addDays(3)->addHours(6),
                'prix' => 350000,
                'devise' => 'CFA',
                'placesDisponibles' => 150,
                'statut' => 'actif',
                'idPartenaire' => 1, 
            ],
        ];

        foreach ($vols as $vol) {
            Vol::updateOrInsert(['numeroVol' => $vol['numeroVol']], $vol);
        }
    }
}


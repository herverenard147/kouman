<?php

namespace Database\Seeders;

use App\Models\Avis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvisSeeder extends Seeder
{
    public function run(): void
    {
        $avis = [
            ['note' => 4.5, 'commentaire' => 'Très bon séjour', 'idClient' => 1, 'idHebergement' => 1, 'idExcursion' => 0],
            ['note' => 3.0, 'commentaire' => 'Correct mais peut mieux faire', 'idClient' => 2, 'idHebergement' => 0, 'idExcursion' => 1],
            ['note' => 5.0, 'commentaire' => 'Expérience parfaite !', 'idClient' => 3, 'idHebergement' => 2, 'idExcursion' => 0],
            ['note' => 5.0, 'commentaire' => 'Expérience parfaite !', 'idClient' => 3, 'idHebergement' => 0, 'idExcursion' => 2],
        ];

        foreach ($avis as $a) {
            Avis::create(array_merge($a, [
                'dateAvis' => now()->subDays(rand(1, 30)),
                'created_at' => now(), 'updated_at' => now()
            ]));
        }
    }
}

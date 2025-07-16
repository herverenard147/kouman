<?php

namespace Database\Seeders;

use App\Models\Disponibilite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisponibilitesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'dateDebut' => now()->toDateString(),
                'dateFin' => now()->addDays(5)->toDateString(),
                'estDisponible' => 1,
                'idHebergement' => 1,
            ],
            [
                'dateDebut' => now()->addDays(6)->toDateString(),
                'dateFin' => now()->addDays(10)->toDateString(),
                'estDisponible' => 0,
                'idHebergement' => 2,
            ],
        ];

        foreach ($data as $item) {
            Disponibilite::updateOrCreate($item, $item);
        }
    }
}

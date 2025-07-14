<?php

namespace Database\Seeders;

use App\Models\PrixHebergement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrixHebergementsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'dateDebut' => now()->toDateString(),
                'dateFin' => now()->addDays(7)->toDateString(),
                'prixParNuit' => 35.00,
                'devise' => 'CFA',
                'idHebergement' => 2,
            ],
            [
                'dateDebut' => now()->addDays(8)->toDateString(),
                'dateFin' => now()->addDays(15)->toDateString(),
                'prixParNuit' => 45.00,
                'devise' => 'CFA',
                'idHebergement' => 3,
            ],
        ];

        foreach ($data as $item) {
            PrixHebergement::updateOrCreate($item, $item);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ComparaisonPrix;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComparaisonPrixSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'client_id' => 1,
                'date_comparaison' => now()->subDays(3),
                'resultat' => 'Excursion A - 50€, Excursion B - 60€',
            ],
            [
                'client_id' => 2,
                'date_comparaison' => now()->subDays(1),
                'resultat' => 'Hébergement A - 100€, Hébergement B - 85€',
            ],
        ];

        foreach ($data as $item) {
            ComparaisonPrix::updateOrCreate(['client_id' => $item['client_id'], 'date_comparaison' => $item['date_comparaison']], $item);
        }
    }
}

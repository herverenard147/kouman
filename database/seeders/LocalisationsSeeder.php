<?php

namespace Database\Seeders;

use App\Models\Localisations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalisationsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['adresse' => 'Abidjan, Cocody', 'ville' => 'Abidjan', 'pays' => 'Côte d\'Ivoire', 'latitude' => 5.3599, 'longitude' => -4.0083],
            ['adresse' => 'Lomé, Tokoin', 'ville' => 'Lomé', 'pays' => 'Togo', 'latitude' => 6.1725, 'longitude' => 1.2314],
            ['adresse' => 'Cotonou, Tokoin', 'ville' => 'Cotonou', 'pays' => 'Bénin', 'latitude' => 6.3693, 'longitude' => 2.3877],
        ];

        foreach ($data as $item) {
            Localisations::updateOrInsert(['adresse' => $item['adresse']], $item);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementsExcursionsSeeder extends Seeder
{
    public function run(): void
    {
        $relations = [
            ['idExcursion' => 1, 'idEquipement' => 1], // Wi-Fi
            ['idExcursion' => 1, 'idEquipement' => 2], // Parking
        ];

        foreach ($relations as $relation) {
            DB::table('equipements_excursions')->updateOrInsert($relation, $relation);
        }
    }
}

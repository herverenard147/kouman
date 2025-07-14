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
            ['idExcursion' => 3, 'idEquipement' => 6], // Wi-Fi
            ['idExcursion' => 3, 'idEquipement' => 7], // Parking
        ];

        foreach ($relations as $relation) {
            DB::table('equipements_excursions')->updateOrInsert($relation, $relation);
        }
    }
}

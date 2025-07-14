<?php

namespace Database\Seeders;

use App\Models\Equipement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipementSeeder extends Seeder
{
   public function run(): void
    {
        $equipements = [
            ['nom' => 'Wi-Fi', 'type' => null],
            ['nom' => 'Piscine', 'type' => null],
            ['nom' => 'Parking', 'type' => null],
            ['nom' => 'Climatisation', 'type' => null],
            ['nom' => 'Cuisine', 'type' => null],
            ['nom' => 'Lave-linge', 'type' => null],
            ['nom' => 'Télévision', 'type' => null],
            ['nom' => 'Animaux acceptés', 'type' => null],
        ];

        foreach ($equipements as $equipement) {
            Equipement::updateOrCreate(['nom' => $equipement['nom']], $equipement);
        }
    }
}

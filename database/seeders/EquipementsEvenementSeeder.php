<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EquipementsEvenementSeeder extends Seeder
{
     public function run(): void
    {
        $donnees = [
            ['idEvenement' => 3, 'idEquipement' => 5],
            ['idEvenement' => 4, 'idEquipement' => 6],
        ];

        foreach ($donnees as $data) {
            DB::table('equipements_evenement')->updateOrInsert(
                ['idEvenement' => $data['idEvenement'], 'idEquipement' => $data['idEquipement']],
                $data
            );
        }
    }
}

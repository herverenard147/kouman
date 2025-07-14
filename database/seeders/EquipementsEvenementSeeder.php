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
            ['idEvenement' => 1, 'idEquipement' => 1],
            ['idEvenement' => 2, 'idEquipement' => 1],
        ];

        foreach ($donnees as $data) {
            DB::table('equipements_evenement')->updateOrInsert(
                ['idEvenement' => $data['idEvenement'], 'idEquipement' => $data['idEquipement']],
                $data
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HebergementEquipementSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['idHebergement' => 4, 'idEquipement' => 1],
            ['idHebergement' => 3, 'idEquipement' => 2],
            ['idHebergement' => 2, 'idEquipement' => 3],
        ];

        foreach ($data as $item) {
            DB::table('hebergement_equipements')->updateOrInsert(
                ['idHebergement' => $item['idHebergement'], 'idEquipement' => $item['idEquipement']],
                $item
            );
        }
    }
}

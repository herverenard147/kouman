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
            ['idHebergement' => 10, 'idEquipement' => 5],
            ['idHebergement' => 11, 'idEquipement' => 6],
            ['idHebergement' => 12, 'idEquipement' => 7],
        ];

        foreach ($data as $item) {
            DB::table('hebergement_equipements')->updateOrInsert(
                ['idHebergement' => $item['idHebergement'], 'idEquipement' => $item['idEquipement']],
                $item
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ExcursionPaiementSeeder extends Seeder
{
    public function run(): void
    {
        $paiements = [
            ['excursion_id' => 1, 'moyen_paiement_id' => 1],
            ['excursion_id' => 1, 'moyen_paiement_id' => 2],
            // ['excursion_id' => 2, 'moyen_paiement_id' => 3],
        ];

        foreach ($paiements as $data) {
            DB::table('excursion_paiement')->updateOrInsert(
                ['excursion_id' => $data['excursion_id'], 'moyen_paiement_id' => $data['moyen_paiement_id']],
                $data
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;

class DateEvenementSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'idEvenement' => 1,
                'date' => '2025-08-10',
                'heure_debut' => '18:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idEvenement' => 2,
                'date' => '2025-08-11',
                'heure_debut' => '16:30:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $i => $item) {
            DB::table('date_evenement')->updateOrInsert([
                    'idEvenement' => $item['idEvenement'],
                    'date' => $item['date'],
                    'heure_debut' => $item['heure_debut'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at'],
                ], $item);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcursionDateSeeder extends Seeder
{
    public function run(): void
    {
        $dates = [
            [
                'idExcursion' => 1,
                'date' => now()->addDays(5)->format('Y-m-d'),
                'heure_debut' => '08:00:00',
                'places_disponibles' => 12,
            ],
            // [
            //     'idExcursion' => 2,
            //     'date' => now()->addDays(10)->format('Y-m-d'),
            //     'heure_debut' => '14:30:00',
            //     'places_disponibles' => 8,
            // ],
        ];

        foreach ($dates as $data) {
            DB::table('excursion_dates')->updateOrInsert(
                ['idExcursion' => $data['idExcursion'], 'date' => $data['date']],
                $data
            );
        }
    }
}

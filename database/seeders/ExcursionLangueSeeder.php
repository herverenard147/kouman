<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcursionLangueSeeder extends Seeder
{
    public function run(): void
    {
        $langues = [
            ['excursion_id' => 3, 'langue_id' => 1],
            ['excursion_id' => 3, 'langue_id' => 2],
            // ['excursion_id' => 2, 'langue_id' => 1],
        ];

        foreach ($langues as $data) {
            DB::table('excursion_langue')->updateOrInsert(
                ['excursion_id' => $data['excursion_id'], 'langue_id' => $data['langue_id']],
                $data
            );
        }
    }
}

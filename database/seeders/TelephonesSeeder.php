<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TelephonesSeeder extends Seeder
{
    public function run(): void
    {
        $telephones = [
            ['numero' => '+2250700000000', 'phoneable_type' => 'App\Models\Client', 'phoneable_id' => 1],
            ['numero' => '+2250700001111', 'phoneable_type' => 'App\Models\Partenaire', 'phoneable_id' => 1],
        ];

        foreach ($telephones as $telephone) {
            DB::table('telephones')->updateOrInsert(['numero' => $telephone['numero']], $telephone);
        }
    }
}

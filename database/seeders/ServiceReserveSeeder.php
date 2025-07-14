<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceReserveSeeder extends Seeder
{
    public function run(): void
    {
        $reserves = [
            ['reservation_id' => 1, 'type_service' => 'hebergement', 'service_id' => 1],
            ['reservation_id' => 1, 'type_service' => 'vol', 'service_id' => 1],
            ['reservation_id' => 2, 'type_service' => 'excursion', 'service_id' => 2],
        ];

        foreach ($reserves as $reserve) {
            DB::table('service_reserves')->updateOrInsert($reserve, $reserve);
        }
    }
}

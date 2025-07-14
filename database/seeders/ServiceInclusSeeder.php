<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceInclusSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['nom_service' => 'Petit déjeuner', 'type_service' => 'hebergement', 'service_id' => 1],
            ['nom_service' => 'Guide francophone', 'type_service' => 'excursion', 'service_id' => 1],
            ['nom_service' => 'Assurance voyage', 'type_service' => 'vol', 'service_id' => 1],
        ];

        foreach ($services as $service) {
            DB::table('service_inclus')->updateOrInsert(['nom_service' => $service['nom_service']], $service);
        }
    }
}

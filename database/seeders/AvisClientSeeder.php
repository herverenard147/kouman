<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvisClientSeeder extends Seeder
{
     public function run(): void
    {
        $avisClients = [
            [
                'client_id' => 1, 'type_service' => 'excursion', 'service_id' => 1,
                'commentaire' => 'Très belle excursion !', 'note' => 4, 'date' => now()
            ],
            [
                'client_id' => 2, 'type_service' => 'vol', 'service_id' => 2,
                'commentaire' => 'Vol en retard mais bon service', 'note' => 3, 'date' => now()
            ],
        ];

        foreach ($avisClients as $avis) {
            // AvisClient::create(array_merge($avis, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}

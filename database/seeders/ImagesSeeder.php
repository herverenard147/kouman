<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            // Images pour des hébergements
            ['url' => 'images/hebergements/hotel1.jpg', 'type_service' => 'hebergement', 'service_id' => 1],
            ['url' => 'images/hebergements/hotel2.jpg', 'type_service' => 'hebergement', 'service_id' => 2],

            // Images pour des excursions
            ['url' => 'images/excursions/excursion1.jpg', 'type_service' => 'excursion', 'service_id' => 1],
            ['url' => 'images/excursions/excursion2.jpg', 'type_service' => 'excursion', 'service_id' => 2],

            // Images pour des événements
            ['url' => 'images/evenements/evenement1.jpg', 'type_service' => 'evenement', 'service_id' => 1],
            ['url' => 'images/evenements/evenement2.jpg', 'type_service' => 'evenement', 'service_id' => 2],

            // Images pour des vols
            ['url' => 'images/vols/vol1.jpg', 'type_service' => 'vol', 'service_id' => 1],
            ['url' => 'images/vols/vol2.jpg', 'type_service' => 'vol', 'service_id' => 2],
        ];

        foreach ($images as $image) {
            DB::table('images')->updateOrInsert(
                [
                    'url' => $image['url'],
                    'type_service' => $image['type_service'],
                    'service_id' => $image['service_id'],
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}

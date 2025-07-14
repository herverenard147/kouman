<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ImagesEvenementSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'idEvenement' => 3,
                'url' => 'uploads/evenements/image1.jpg',
                // 'description' => 'Affiche principale de l’événement culturel',
            ],
            [
                'idEvenement' => 3,
                'url' => 'uploads/evenements/image2.jpg',
                // 'description' => 'Scène pendant la soirée',
            ],
            [
                'idEvenement' => 4,
                'url' => 'uploads/evenements/image3.jpg',
                // 'description' => 'Photo du lieu de l’événement musical',
            ],
            [
                'idEvenement' => 4,
                'url' => 'uploads/evenements/image4.jpg',
                // 'description' => 'Ambiance générale',
            ],
            [
                'idEvenement' => 4,
                'url' => 'uploads/evenements/image5.jpg',
                // 'description' => 'Vue du public',
            ],
        ];

        foreach ($images as $img) {
             DB::table('images_evenement')->updateOrInsert(
                ['url' => $img['url']],
                $img
            );
        }
    }
}

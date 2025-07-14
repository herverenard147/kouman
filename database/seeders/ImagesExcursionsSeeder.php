<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesExcursionsSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['idExcursion' => 1, 'idImage' => 1, 'url' => 'images/excursions/img1.jpg',
        'estPrincipale' => true],
            ['idExcursion' => 1, 'idImage' => 2, 'url' => 'images/excursions/img1_alt.jpg',
        'estPrincipale' => false],
        ];

        foreach ($images as $data) {
            DB::table('images_excursions')->updateOrInsert(
                ['idExcursion' => $data['idExcursion'], 'url' => $data['url']],
                $data
            );
        }
    }
}

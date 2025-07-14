<?php

namespace Database\Seeders;

use App\Models\FamilleTypeHebergements;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilleTypeHebergementSeeder extends Seeder
{
    public function run(): void
    {
        $familles = [
            ['nomFamille' => 'Appartement'],
            ['nomFamille' => 'Maison'],
            ['nomFamille' => 'Hôtel'],
        ];

        foreach ($familles as $famille) {
            FamilleTypeHebergements::updateOrCreate(['nomFamille' => $famille['nomFamille']], $famille);
        }
    }
}


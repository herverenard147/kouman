<?php

namespace Database\Seeders;

use App\Models\TypeHebergement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeHebergementSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nomType' => 'Studio', 'idFamilleType' => 1],
            ['nomType' => 'Villa', 'idFamilleType' => 2],
            ['nomType' => 'Chambre d’hôtel', 'idFamilleType' => 3],
        ];

        foreach ($types as $type) {
            TypeHebergement::updateOrCreate(['nomType' => $type['nomType']], $type);
        }
    }
}

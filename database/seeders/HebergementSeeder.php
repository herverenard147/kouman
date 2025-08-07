<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hebergement;

class HebergementSeeder extends Seeder
{
    public function run(): void
    {
        $hebergements = [
            [
                'nom' => 'Résidence Belle Vue',
                'description' => 'Appartement moderne avec vue sur la mer à Cocody.',
                'prixParNuit' => 50000,
                'devise' => 'CFA',
                'noteMoyenne' => 4.5,
                'nombreChambres' => 2,
                'nombreSallesDeBain' => 1,
                'capaciteMax' => 4,
                'statut' => 'actif',
                'heureArrivee' => '14:00:00',
                'heureDepart' => '12:00:00',
                'idType' => 1,
                'stock' => 1,
                'idLocalisation' => 1,
                'idPartenaire' => 1,
                'idPolitiqueAnnulation' => 1,
            ],
            [
                'nom' => 'Villa Oasis',
                'description' => 'Villa avec piscine privée à Assinie.',
                'prixParNuit' => 90000,
                'devise' => 'CFA',
                'noteMoyenne' => 4.8,
                'nombreChambres' => 4,
                'nombreSallesDeBain' => 3,
                'capaciteMax' => 8,
                'statut' => 'actif',
                'heureArrivee' => '15:00:00',
                'heureDepart' => '11:00:00',
                'idType' => 2,
                'idLocalisation' => 2,
                'idPartenaire' => 2,
                'stock' => 4,
                'idPolitiqueAnnulation' => 2,
            ],
            [
                'nom' => 'Appart Hôtel Lagoon',
                'description' => 'Studio équipé en centre-ville.',
                'prixParNuit' => 30000,
                'devise' => 'CFA',
                'noteMoyenne' => 4.2,
                'nombreChambres' => 1,
                'nombreSallesDeBain' => 1,
                'capaciteMax' => 2,
                'stock' => 2,
                'statut' => 'actif',
                'heureArrivee' => '13:00:00',
                'heureDepart' => '11:00:00',
                'idType' => 3,
                'idLocalisation' => 3,
                'idPartenaire' => 3,
                'idPolitiqueAnnulation' => 1,
            ]
        ];

        foreach ($hebergements as $hebergement) {
            Hebergement::updateOrInsert(
                ['nom' => $hebergement['nom']],
                array_merge($hebergement, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}

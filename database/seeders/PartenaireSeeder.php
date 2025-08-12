<?php

namespace Database\Seeders;

use App\Models\Partenaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PartenaireSeeder extends Seeder
{
    public function run(): void
    {
        $partenaires = [
            [
                'nom_entreprise' => 'Société Soleil', 'email' => 'contact@soleil.com', 'type' => 'hotel',
                'telephone' => '+2250701010101', 'adresse' => 'Abidjan', 'siteWeb' => 'https://soleil.com',
                'statut' => 'actif', 'password' => bcrypt('password'), 'remember_token' => Str::random(10)
            ],
            [
                'nom_entreprise' => 'Voyage Express', 'email' => 'info@voyagexpress.com', 'type' => 'agence_voyage',
                'telephone' => '+2250505050505', 'adresse' => 'Yamoussoukro', 'siteWeb' => 'https://voyagexpress.com',
                'statut' => 'actif', 'password' => bcrypt('password'), 'remember_token' => Str::random(10)
            ],
            [
                'nom_entreprise' => 'Noom', 'email' => 'info@noom.com', 'type' => 'residence',
                'telephone' => '+2250505050506', 'adresse' => 'Yamoussoukro', 'siteWeb' => 'https://noom.com',
                'statut' => 'actif', 'password' => bcrypt('password'), 'remember_token' => Str::random(10)
            ],
        ];

        foreach ($partenaires as $partenaire) {
            Partenaire::updateOrCreate(['email' => $partenaire['email']], $partenaire);
        }
    }
}

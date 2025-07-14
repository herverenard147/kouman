<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministrateurSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            ['nom' => 'Audrey Mathieu', 'email' => 'clemence52@roche.com', 'mot_de_passe' => bcrypt('password')],
            ['nom' => 'Bernadette Evrard', 'email' => 'gabriel37@bouygtel.fr', 'mot_de_passe' => bcrypt('password')],
            ['nom' => 'Georges Legendre', 'email' => 'mmarchal@bouygtel.fr', 'mot_de_passe' => bcrypt('password')],
        ];

        foreach ($admins as $admin) {
            Administrateur::updateOrCreate(['email' => $admin['email']], $admin);
        }
    }
}

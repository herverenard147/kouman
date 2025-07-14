<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['nom' => 'Audrey Mathieu', 'email' => 'clemence52@roche.com', 'mot_de_passe' => bcrypt('password')],
            ['nom' => 'Bernadette Evrard', 'email' => 'gabriel37@bouygtel.fr', 'mot_de_passe' => bcrypt('password')],
            ['nom' => 'Georges Legendre', 'email' => 'mmarchal@bouygtel.fr', 'mot_de_passe' => bcrypt('password')],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['email' => $client['email']], $client);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Equipement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipementSeeder extends Seeder
{
   public function run(): void
    {
        $equipements = [
            ['nom' => 'Parking', 'type' => null],
            ['nom' => 'Cuisine', 'type' => null],
            ['nom' => 'Lave-linge', 'type' => null],
            ['nom' => 'Animaux acceptés', 'type' => null],
            ['nom' => 'Wi-Fi'],
            ['nom' => 'Climatisation'],
            ['nom' => 'Télévision à écran plat'],
            ['nom' => 'Mini-bar'],
            ['nom' => 'Coffre-fort'],
            ['nom' => 'Bureau'],
            ['nom' => 'Balcon ou terrasse'],
            ['nom' => 'Vue sur la mer'],
            ['nom' => 'Service de chambre'],
            ['nom' => 'Salle de bain privative'],
            ['nom' => 'Douche'],
            ['nom' => 'Baignoire'],
            ['nom' => 'Peignoir et chaussons'],
            ['nom' => 'Sèche-cheveux'],
            ['nom' => 'Produits de toilette gratuits'],
            ['nom' => 'Lit king size'],
            ['nom' => 'Lit queen size'],
            ['nom' => 'Réfrigérateur'],
            ['nom' => 'Machine à café'],
            ['nom' => 'Bouilloire électrique'],
            ['nom' => 'Table à manger'],
            ['nom' => 'Chauffage'],
            ['nom' => 'Accès PMR'],
            ['nom' => 'Piscine privée'],
            ['nom' => 'Jacuzzi'],
            ['nom' => 'Coin salon'],
            ['nom' => 'Armoire ou penderie'],
            ['nom' => 'Planche et fer à repasser'],
            ['nom' => 'Moustiquaire'],
            ['nom' => 'Téléphone'],
        ];

        foreach ($equipements as $equipement) {
            Equipement::updateOrCreate(['nom' => $equipement['nom']], $equipement);
        }
    }
}

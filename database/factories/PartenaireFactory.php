<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Partenaire;

class PartenaireFactory extends Factory
{
    protected $model = Partenaire::class;

    public function definition()
    {
        return [
            'nom_entreprise' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => $this->faker->randomElement(['hotel', 'agence_voyage', 'compagnie_aerienne', 'residence']),
            'téléphone' => $this->faker->phoneNumber(),
            'adresse' => $this->faker->address(),
            'siteWeb' => $this->faker->url(),
            'statut' => 'actif',
            'mot_de_passe' => Hash::make('password'), // mot de passe hashé
            'remember_token' => Str::random(10),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Hebergement;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TypeHebergement;
use App\Models\Localisations;
use App\Models\Partenaire;
use App\Models\PolitiquesAnnulation;

class HebergementFactory extends Factory
{
    protected $model = Hebergement::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'prixParNuit' => $this->faker->numberBetween(10000, 100000),
            'devise' => 'CFA',
            'noteMoyenne' => $this->faker->randomFloat(1, 1, 5),
            'nombreChambres' => $this->faker->numberBetween(1, 10),
            'nombreSallesDeBain' => $this->faker->numberBetween(1, 5),
            'numeroDeTel' => $this->faker->phoneNumber,
            'capaciteMax' => $this->faker->numberBetween(1, 20),
            'statut' => 'actif',
            'heureArrivee' => $this->faker->time('H:i:s'),
            'heureDepart' => $this->faker->time('H:i:s'),
            'idType' => TypeHebergement::factory(),
            'idLocalisation' => Localisations::factory(),
            'idPartenaire' => Partenaire::factory(),
            'idPolitiqueAnnulation' => PolitiquesAnnulation::factory(),
        ];
    }
}

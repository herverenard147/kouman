<?php

namespace Database\Factories;

use App\Models\PolitiquesAnnulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PolitiquesAnnulationFactory extends Factory
{
    protected $model = PolitiquesAnnulation::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            // 'pourcentageRemboursement' => $this->faker->numberBetween(0, 100),
        ];
    }
}

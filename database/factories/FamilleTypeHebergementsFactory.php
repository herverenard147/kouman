<?php

namespace Database\Factories;

use App\Models\FamilleTypeHebergements;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilleTypeHebergementsFactory extends Factory
{
    protected $model = FamilleTypeHebergements::class;

    public function definition(): array
    {
        return [
            'nomFamille' => $this->faker->word,
            // 'description' => $this->faker->sentence,
        ];
    }
}

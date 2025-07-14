<?php

namespace Database\Factories;

use App\Models\TypeHebergement;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FamilleTypeHebergements;

class TypeHebergementFactory extends Factory
{
    protected $model = TypeHebergement::class;

    public function definition(): array
    {
        return [
            'nomType' => $this->faker->word,
            // 'description' => $this->faker->sentence,
            'idFamilleType' => FamilleTypeHebergements::factory(),
        ];
    }
}

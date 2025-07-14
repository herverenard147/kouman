<?php

namespace Database\Factories;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipementFactory extends Factory
{
    protected $model = Equipement::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'icone' => $this->faker->imageUrl(32, 32, 'technics', true),
        ];
    }
}

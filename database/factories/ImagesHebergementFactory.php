<?php

namespace Database\Factories;

use App\Models\ImagesHebergement;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hebergement;

class ImagesHebergementFactory extends Factory
{
    protected $model = ImagesHebergement::class;

    public function definition(): array
    {
        return [
            'idHebergement' => Hebergement::factory(),
            'url' => $this->faker->imageUrl(640, 480, 'building', true),
            'estPrincipale' => false,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Localisations;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalisationsFactory extends Factory
{
    protected $model = Localisations::class;

    public function definition(): array
    {
        return [
            'ville' => $this->faker->city,
            'pays' => $this->faker->country,
            'codePostal' => $this->faker->postcode,
            'adresse' => $this->faker->streetAddress,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}

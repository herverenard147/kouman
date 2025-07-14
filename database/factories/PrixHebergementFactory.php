<?php

namespace Database\Factories;

use App\Models\PrixHebergement;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hebergement;

class PrixHebergementFactory extends Factory
{
    protected $model = PrixHebergement::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('now', '+1 month');
        $end = $this->faker->dateTimeBetween($start, '+2 months');
        return [
            'idHebergement' => Hebergement::factory(),
            'dateDebut' => $start->format('Y-m-d'),
            'dateFin' => $end->format('Y-m-d'),
            'prixParNuit' => $this->faker->numberBetween(5000, 50000),
            'devise' => 'CFA',
        ];
    }
}

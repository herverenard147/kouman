<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $reservations = [
            [
                'client_id' => 1,
                'date_reservation' => now()->subDays(1),
                'statut' => 'confirmée',
            ],
            [
                'client_id' => 2,
                'date_reservation' => now(),
                'statut' => 'en attente',
            ],
        ];

        foreach ($reservations as $reservation) {
            Reservation::updateOrCreate([
                'client_id' => $reservation['client_id'],
                'date_reservation' => $reservation['date_reservation'],
            ], $reservation);
        }
    }
}


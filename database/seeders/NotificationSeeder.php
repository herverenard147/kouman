<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $notifications = [
            [
                'client_id' => 1,
                'message' => 'Votre réservation a été confirmée.',
                'lu' => 0,
                'date_envoi' => now(),
            ],
            [
                'client_id' => 2,
                'message' => 'Nouveau message de votre partenaire.',
                'lu' => 3,
                'date_envoi' => now(),
            ],
        ];

        foreach ($notifications as $notification) {
            Notification::updateOrCreate([
                'client_id' => $notification['client_id'],
                'message' => $notification['message'],
                'lu' => $notification['lu'],
                'date_envoi' => $notification['date_envoi'],
            ], $notification);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LangueSeeder::class,
            MoyenPaiementSeeder::class,
            FamilleTypeHebergementSeeder::class,
            TypeHebergementSeeder::class,
            ClientSeeder::class,
            UsersSeeder::class,
            CustomersSeeder::class,
            PartenaireSeeder::class,
            AdministrateurSeeder::class,
            LocalisationsSeeder::class,
            // HebergementSeeder::class,
            // PrixHebergementsSeeder::class,
            // DisponibilitesSeeder::class,
            PolitiqueAnnulationSeeder::class,
            // ExcursionSeeder::class,
            EquipementSeeder::class,
            // EvenementSeeder::class,
            // EquipementsExcursionsSeeder::class,
            // EquipementsEvenementSeeder::class,
            // HebergementEquipementSeeder::class,
            // ImagesSeeder::class,
            // ImagesHebergementsSeeder::class,
            // ImagesExcursionsSeeder::class,
            // ImagesEvenementSeeder::class,
            // VolSeeder::class,
            // ExcursionDateSeeder::class,
            // ExcursionLangueSeeder::class,
            // ExcursionPaiementSeeder::class,
            // DateEvenementSeeder::class,
            // AvisSeeder::class,
            // AvisClientSeeder::class,
            // ComparaisonPrixSeeder::class,
            // OffreVoyageSeeder::class,
            // ReservationSeeder::class,
            // ServiceReserveSeeder::class,
            // ServiceInclusSeeder::class,
            // TransactionSeeder::class,
            // NotificationSeeder::class,
            // TelephonesSeeder::class,
        ]);
    }
}

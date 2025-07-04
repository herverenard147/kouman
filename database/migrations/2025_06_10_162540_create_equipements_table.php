<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->id('idEquipement');
            $table->string('nom', 100);
            $table->timestamps();
        });

        DB::table('equipements')->insert([
            ['nom' => 'Wi-Fi'],
            ['nom' => 'Piscine'],
            ['nom' => 'Parking'],
            ['nom' => 'Climatisation'],
            ['nom' => 'Cuisine'],
            ['nom' => 'Lave-linge'],
            ['nom' => 'Télévision'],
            ['nom' => 'Animaux acceptés'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};

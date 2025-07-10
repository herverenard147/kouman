<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipements_excursions', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('idExcursion')->constrained('excursions')->onDelete('cascade');
            $table->foreignId('idEquipement')->constrained('equipements')->onDelete('cascade');
            $table->primary(['idExcursion', 'idEquipement']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements_excursions');
    }
};

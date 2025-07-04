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
        Schema::create('disponibilites', function (Blueprint $table) {
            $table->id('idDisponibilite');
            $table->date('dateDebut');
            $table->unsignedBigInteger( 'idHebergement');
            $table->date('dateFin');
            $table->boolean('estDisponible')->default(true);
            $table->timestamps();

            $table->foreign('idHebergement')->references('idHebergement')->on('hebergements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilites');
    }
};

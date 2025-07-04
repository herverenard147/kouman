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
        Schema::create('hebergement_equipements', function (Blueprint $table) {
            $table->unsignedBigInteger('idHebergement');
            $table->unsignedBigInteger('idEquipement');
            $table->foreign('idHebergement')->references('idHebergement')->on('hebergements')->onDelete('cascade');
            $table->foreign('idEquipement')->references('idEquipement')->on('equipements')->onDelete('cascade');
            $table->primary(['idHebergement', 'idEquipement']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hebergement_equipements');
    }
};

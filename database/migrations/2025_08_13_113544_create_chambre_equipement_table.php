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
        Schema::create('chambre_equipements', function (Blueprint $table) {
            $table->foreignId('idChambre')->constrained('Chambres')->onDelete('cascade');
            $table->foreignId('idEquipement')->constrained('equipements')->onDelete('cascade');
            $table->primary(['idChambre', 'idEquipement']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambre_equipement');
    }
};

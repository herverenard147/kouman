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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 150);
            $table->text('description')->nullable();
            $table->decimal('duree', 5, 2); // Durée en heures
            $table->decimal('prix', 10, 2);
            $table->string('devise', 3);
            $table->integer('capacite_max')->unsigned()->default(1);

            $table->enum('statut', ['brouillon', 'actif', 'complet', 'annule'])->default('brouillon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};

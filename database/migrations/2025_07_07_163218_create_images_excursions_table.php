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
        Schema::create('images_excursions', function (Blueprint $table) {
            $table->id('idImage');
            $table->foreignId('idExcursion')->constrained('excursions')->onDelete('cascade');
            $table->string('url');
            $table->boolean('estPrincipale')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_excursions');
    }
};

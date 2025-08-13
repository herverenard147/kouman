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
        Schema::create('image_chambres', function (Blueprint $table) {
            $table->id();
            $table->string('url', 255);
            $table->boolean('estPrincipale')->default(false);
            $table->foreignId('idChambre')->constrained('chambres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_chambres');
    }
};

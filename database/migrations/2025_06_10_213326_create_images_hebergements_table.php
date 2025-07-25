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
        Schema::create('images_hebergements', function (Blueprint $table) {
            $table->id();
            $table->string('url', 255);
            $table->boolean('estPrincipale')->default(false);
            $table->foreignId('idHebergement')->constrained('hebergements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_hebergements');
    }
};

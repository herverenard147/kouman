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
        Schema::create('comparaison_prix', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients');
            $table->dateTime('date_comparaison');
            $table->text('resultat');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comparaison_prixes');
    }
};

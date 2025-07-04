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
        Schema::create('prix_hebergements', function (Blueprint $table) {
            $table->id('idPrix');
            $table->date('dateDebut');
            $table->unsignedBigInteger( 'idHebergement');
            $table->date('dateFin');
            $table->decimal('prixParNuit', 10, 2);
            $table->string('devise', 3)->default('EUR');
            $table->timestamps();

            $table->foreign('idHebergement')->references('idHebergement')->on('hebergements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prix_hebergements');
    }
};

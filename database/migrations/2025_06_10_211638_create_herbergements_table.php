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
        Schema::create('hebergements', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->text('description')->nullable();
            $table->decimal('prixParNuit', 10, 2);
            $table->string('devise', 3)->default('CFA');
            $table->decimal('noteMoyenne', 3, 1)->default(0.0);
            $table->integer('nombreChambres')->default(0);
            $table->integer('capaciteMax');
            $table->enum('statut', ['actif', 'inactif'])->default('actif');
            $table->time('heureArrivee')->nullable();
            $table->time('heureDepart')->nullable();
            $table->integer('nombreSallesDeBain')->default(1);
            $table->timestamps();

            $table->unsignedBigInteger('idType'); // Type compatible avec idType de types_hebergement
            $table->unsignedBigInteger('idLocalisation');
            $table->unsignedBigInteger('idPartenaire');
            $table->unsignedBigInteger('idPolitiqueAnnulation')->nullable();
            // Clés étrangères explicites
            $table->foreign('idType')->references('id')->on('types_hebergement');
            $table->foreign('idLocalisation')->references('id')->on('localisations')->onDelete('cascade');
            $table->foreign('idPartenaire')->references('id')->on('partenaires');
            $table->foreign('idPolitiqueAnnulation')->references('id')->on('politiques_annulation')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hebergements');
    }
};

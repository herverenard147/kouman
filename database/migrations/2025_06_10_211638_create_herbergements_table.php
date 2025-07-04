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
            // $table->id('idHebergement');
            // $table->string('nom', 255);
            // $table->foreignId('idType')->constrained('types_hebergement');
            // $table->text('description')->nullable();
            // $table->decimal('prixParNuit', 10, 2);
            // $table->string('devise', 3)->default('EUR'); // Pour application internationale
            // $table->foreignId('idLocalisation')->constrained('localisations');
            // $table->foreignId('id')->constrained('partenaires');
            // $table->decimal('noteMoyenne', 3, 1)->default(0.0);
            // $table->integer('nombreChambres')->default(0);
            // $table->foreignId('idPolitiqueAnnulation')->nullable()->constrained('politiques_annulation');
            // $table->integer('capaciteMax');
            // $table->enum('statut', ['actif', 'inactif'])->default('actif');
            // $table->time('heureArrivee')->nullable();
            // $table->time('heureDepart')->nullable();
            // $table->timestamps();

            $table->id('idHebergement');
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
            $table->timestamps();

            $table->unsignedBigInteger('idType'); // Type compatible avec idType de types_hebergement
            $table->unsignedBigInteger('idLocalisation');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('idPolitiqueAnnulation')->nullable();
            // Clés étrangères explicites
            $table->foreign('idType')->references('idType')->on('types_hebergement');
            $table->foreign('idLocalisation')->references('idLocalisation')->on('localisations')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('partenaires');
            $table->foreign('idPolitiqueAnnulation')->references('idPolitique')->on('politiques_annulation')->onDelete('set null');
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

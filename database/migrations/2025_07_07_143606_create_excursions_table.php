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
        Schema::create('excursions', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 150); // Augmenté à 150 pour plus de flexibilité
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->string('devise', 3); // CFA, EUR, USD, etc.
            $table->decimal('duree', 5, 2); // Durée en heures avec précision (ex. 2.5)
            $table->integer('capacite_max')->unsigned()->default(1); // Capacité maximale
            $table->foreignId('partenaire_id')->constrained('partenaires')->onDelete('cascade');
            $table->text('itineraire')->nullable();
            $table->string('nom_guide', 150)->nullable();
            $table->text('langues')->nullable(); // tu peux aussi utiliser ->json() si tu préfères
            $table->enum('recurrence', ['ponctuelle', 'quotidienne', 'hebdomadaire', 'mensuelle'])->default('ponctuelle');
            $table->unsignedInteger('age_minimum')->default(0);
            $table->text('conditions')->nullable();
            $table->text('moyens_paiement')->nullable(); // ou ->json() si tu préfères

            $table->foreignId('localisation_id')
                ->nullable()
                ->constrained('localisations')
                ->onDelete('set null');

            $table->enum('statut', ['brouillon', 'active', 'complete', 'annulee'])->default('brouillon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excursions');
    }
};

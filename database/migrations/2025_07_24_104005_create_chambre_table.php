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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
             $table->string('numero', 50); // Numéro ou nom de la chambre
            $table->text('description')->nullable();
            $table->decimal('prixParNuit', 10, 2)->nullable();
            $table->string('devise', 10)->default('XOF');
            $table->integer('stock')->default(1);
            $table->integer('capaciteMax')->default(1);
            $table->integer('nombreLits')->default(1);
            $table->integer('nombreSallesDeBain')->default(1);
            $table->decimal('surface', 8, 2)->nullable(); // en m²
            $table->enum('statut', ['disponible', 'indisponible'])->default('disponible');

            // Liens vers d'autres tables
            $table->foreignId('idPartenaire')
                  ->constrained('partenaires')
                  ->onDelete('cascade');

            $table->foreignId('idLocalisation')
                  ->nullable()
                  ->constrained('localisations')
                  ->onDelete('set null');

            $table->foreignId('idPolitiqueAnnulation')
                  ->nullable()
                  ->constrained('politiques_annulation')
                  ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambre');
    }
};

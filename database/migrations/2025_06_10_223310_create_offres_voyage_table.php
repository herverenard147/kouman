<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offres_voyage', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idOffreVoyage');
            $table->unsignedBigInteger('id');
            $table->string('titre', 255);
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->string('devise', 3)->default('EUR');
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
            $table->string('destination', 100);
            $table->integer('dureeJours')->nullable();
            $table->enum('statut', ['actif', 'inactif'])->default('actif');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('partenaires');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offres_voyage');
    }
};

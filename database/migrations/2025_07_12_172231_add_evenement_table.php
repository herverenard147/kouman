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
        Schema::table('evenements', function (Blueprint $table) {
            // Ajout de la colonne 'idPartenaire' pour la clé étrangère
            $table->unsignedBigInteger('idPartenaire');
            $table->unsignedBigInteger('idLocalisation');

            // Définition de la clé étrangère
            $table->foreign('idLocalisation')->references('id')->on('localisations')->onDelete('cascade');
            $table->foreign('idPartenaire')->references('id')->on('partenaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

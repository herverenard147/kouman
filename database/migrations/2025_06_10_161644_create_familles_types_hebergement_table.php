<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('familles_types_hebergement', function (Blueprint $table) {
            $table->id('idFamilleType');
            $table->string('nomFamille', 100);
            $table->timestamps();
        });

        // Insérer les familles initiales
        DB::table('familles_types_hebergement')->insert([
            ['nomFamille' => 'Hébergements hôteliers'],
            ['nomFamille' => 'Hébergements locatifs'],
            ['nomFamille' => 'Hébergements chez l\'habitant'],
            ['nomFamille' => 'Hébergements économiques'],
            ['nomFamille' => 'Hébergements insolites'],
            ['nomFamille' => 'Hébergements en plein air'],
            ['nomFamille' => 'Hébergements communautaires ou spirituels'],
            ['nomFamille' => 'Hébergements de longue durée'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familles_types_hebergement');
    }
};

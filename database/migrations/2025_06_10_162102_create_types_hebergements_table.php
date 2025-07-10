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
        Schema::create('types_hebergement', function (Blueprint $table) {
            $table->id();
            $table->string('nomType', 100);
            $table->timestamps();

            $table->foreignId('idFamilleType')->constrained('familles_types_hebergement')->onDelete('cascade');
        });

        // Insérer les types initiaux
        DB::table('types_hebergement')->insert([
            // Hébergements hôteliers
            ['nomType' => 'Hôtel', 'idFamilleType' => 1],
            ['nomType' => 'Motel', 'idFamilleType' => 1],
            ['nomType' => 'Auberge', 'idFamilleType' => 1],
            ['nomType' => 'Resort', 'idFamilleType' => 1],
            ['nomType' => 'Boutique-hôtel', 'idFamilleType' => 1],
            ['nomType' => 'Hôtel capsule', 'idFamilleType' => 1],
            // Hébergements locatifs
            ['nomType' => 'Appartement', 'idFamilleType' => 2],
            ['nomType' => 'Maison de vacances', 'idFamilleType' => 2],
            ['nomType' => 'Villa', 'idFamilleType' => 2],
            ['nomType' => 'Gîte', 'idFamilleType' => 2],
            ['nomType' => 'Chalet', 'idFamilleType' => 2],
            ['nomType' => 'Bungalow', 'idFamilleType' => 2],
            // Hébergements chez l'habitant
            ['nomType' => 'Chambre d’hôtes', 'idFamilleType' => 3],
            ['nomType' => 'Homestay', 'idFamilleType' => 3],
            ['nomType' => 'Couchsurfing', 'idFamilleType' => 3],
            // Hébergements économiques
            ['nomType' => 'Auberge de jeunesse', 'idFamilleType' => 4],
            ['nomType' => 'Pension', 'idFamilleType' => 4],
            ['nomType' => 'Camping économique', 'idFamilleType' => 4],
            // Hébergements insolites
            ['nomType' => 'Yourte', 'idFamilleType' => 5],
            ['nomType' => 'Cabane dans les arbres', 'idFamilleType' => 5],
            ['nomType' => 'Igloo ou hôtel de glace', 'idFamilleType' => 5],
            ['nomType' => 'Bulle transparente', 'idFamilleType' => 5],
            ['nomType' => 'Bateau ou péniche', 'idFamilleType' => 5],
            ['nomType' => 'Wagon ou train aménagé', 'idFamilleType' => 5],
            // Hébergements en plein air
            ['nomType' => 'Camping', 'idFamilleType' => 6],
            ['nomType' => 'Glamping', 'idFamilleType' => 6],
            ['nomType' => 'Bivouac', 'idFamilleType' => 6],
            // Hébergements communautaires ou spirituels
            ['nomType' => 'Monastère ou couvent', 'idFamilleType' => 7],
            ['nomType' => 'Ashram', 'idFamilleType' => 7],
            ['nomType' => 'Écovillage', 'idFamilleType' => 7],
            // Hébergements de longue durée
            ['nomType' => 'Résidence hôteliere', 'idFamilleType' => 8],
            ['nomType' => 'Coliving', 'idFamilleType' => 8],
            ['nomType' => 'Colocation', 'idFamilleType' => 8],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types_hebergements');
    }
};

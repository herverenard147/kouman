<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('types_chambres', function (Blueprint $table) {
            $table->id();
            $table->string('nomType', 00);
            $table->timestamps();
        });
        DB::table('types_chambres')->insert([
            ['nomType' => 'Chambre simple'],
            ['nomType' => 'Chambre double'],
            ['nomType' => 'Chambre twin'],
            ['nomType' => 'Chambre triple'],
            ['nomType' => 'Suite'],
            ['nomType' => 'Suite junior'],
            ['nomType' => 'Chambre familiale'],
            ['nomType' => 'Chambre deluxe'],
            ['nomType' => 'Chambre exécutive'],
            ['nomType' => 'Penthouse'],
            ['nomType' => 'Chambre accessible'],
            ['nomType' => 'Bungalow privé'],
            ['nomType' => 'Villa privée'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_chambres');
    }
};

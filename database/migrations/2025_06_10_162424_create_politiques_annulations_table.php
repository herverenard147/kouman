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
        Schema::create('politiques_annulation', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insérer des politiques initiales
        DB::table('politiques_annulation')->insert([
            ['nom' => 'Flexible', 'description' => 'Remboursement intégral jusqu’à 24h avant l’arrivée.'],
            ['nom' => 'Modérée', 'description' => 'Remboursement intégral jusqu’à 7 jours avant l’arrivée.'],
            ['nom' => 'Stricte', 'description' => 'Non remboursable.'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('politiques_annulations');
    }
};

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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('compagnie', 100);
            $table->string('depart', 100);
            $table->string('arrivee', 100);
            $table->dateTime('date_depart');
            $table->decimal('prix', 10, 2);
            $table->foreignId('partenaire_id')->constrained('partenaires');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};

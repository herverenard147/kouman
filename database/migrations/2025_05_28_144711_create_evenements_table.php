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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('lieu', 100);
            $table->date('date');
            $table->decimal('prix', 10, 2);
            $table->string('type', 50);
            $table->integer('nb_billets');
            $table->foreignId('partenaire_id')->constrained('partenaires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};

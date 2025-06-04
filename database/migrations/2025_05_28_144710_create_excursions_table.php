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
            $table->string('titre', 100);
            $table->text('description');
            $table->date('date');
            $table->integer('duree');
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
        Schema::dropIfExists('excursions');
    }
};

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
        Schema::create('disponibilites', function (Blueprint $table) {
            $table->id();
            $table->enum('type_service', ['hebergement','vol','excursion','evenement']);
            $table->unsignedBigInteger('service_id');
            $table->date('date');
            $table->boolean('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilites');
    }
};

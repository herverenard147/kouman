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
        Schema::create('langues', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('code_iso', 10)->nullable(); // ex: fr, en
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('langues');
    }
};

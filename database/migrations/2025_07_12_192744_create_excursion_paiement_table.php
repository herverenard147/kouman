<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('excursion_paiement', function (Blueprint $table) {
            $table->foreignId('excursion_id')->constrained('excursions')->onDelete('cascade');
            $table->foreignId('moyen_paiement_id')->constrained('moyens_paiement')->onDelete('cascade');
            $table->primary(['excursion_id', 'moyen_paiement_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('excursion_paiement');
    }
};

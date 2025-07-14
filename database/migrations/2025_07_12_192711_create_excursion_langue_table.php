<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('excursion_langue', function (Blueprint $table) {
            $table->foreignId('excursion_id')->constrained('excursions')->onDelete('cascade');
            $table->foreignId('langue_id')->constrained('langues')->onDelete('cascade');
            $table->primary(['excursion_id', 'langue_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('excursion_langue');
    }
};

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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->decimal('note', 3, 1);
            $table->text('commentaire')->nullable();
            $table->timestamp('dateAvis')->useCurrent();

            $table->foreignId('idClient')->constrained('clients')->onDelete('cascade');
            $table->foreignId('idHebergement')->constrained('hebergements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};

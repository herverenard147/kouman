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
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise', 100);
            $table->string('email', 100)->unique();
            $table->enum('type', ['hotel', 'agence_voyage', 'compagnie_aerienne', 'residence', 'evenementiel']);
            $table->string('telephone', 100)->unique();
            $table->string('adresse', 100);
            $table->string('siteWeb', 100)->nullable()->unique();
            $table->string('statut', 100);
            $table->string('password', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('numeroDeTel', 20)->nullable()->change();
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaires');
    }
};

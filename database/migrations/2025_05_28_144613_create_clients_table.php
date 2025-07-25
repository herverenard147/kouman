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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->string('prenom')->nullable()->after('nom');
            $table->string('telephone', 20)->nullable()->after('email');
            $table->string('adresse')->nullable()->after('telephone');
            $table->string('ville')->nullable()->after('adresse');
            $table->string('pays')->nullable()->after('ville');
            $table->string('code_postal', 20)->nullable()->after('pays');
            $table->date('date_naissance')->nullable()->after('code_postal');
            $table->enum('genre', ['homme', 'femme', 'autre'])->nullable()->after('date_naissance');
            $table->string('photo_profil')->nullable()->after('genre');
            $table->string('langue_preferee', 10)->default('fr')->after('photo_profil');
            $table->boolean('newsletter')->default(false)->after('langue_preferee');
            $table->timestamp('email_verified_at')->nullable()->after('newsletter');
            $table->rememberToken()->after('email_verified_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

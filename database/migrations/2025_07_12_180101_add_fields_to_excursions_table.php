<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('excursions', function (Blueprint $table) {
            $table->text('itineraire')->nullable();
            $table->string('nom_guide', 150)->nullable();
            $table->text('langues')->nullable(); // tu peux aussi utiliser ->json() si tu préfères
            $table->enum('recurrence', ['ponctuelle', 'quotidienne', 'hebdomadaire', 'mensuelle'])->default('ponctuelle');
            $table->unsignedInteger('age_minimum')->default(0);
            $table->text('conditions')->nullable();
            $table->text('moyens_paiement')->nullable(); // ou ->json() si tu préfères
        });
    }

    public function down(): void
    {
        Schema::table('excursions', function (Blueprint $table) {
            $table->dropColumn([
                'itineraire',
                'nom_guide',
                'langues',
                'recurrence',
                'age_minimum',
                'conditions',
                'moyens_paiement',
            ]);
        });
    }
};

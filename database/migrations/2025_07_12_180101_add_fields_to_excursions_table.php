<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('excursions', function (Blueprint $table) {
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

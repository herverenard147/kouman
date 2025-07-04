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
        Schema::table('hebergements', function (Blueprint $table) {
            $table->integer('nombreSallesDeBain')->default(1)->after('nombreChambres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hebergements', function (Blueprint $table) {
            //
        });
    }
};

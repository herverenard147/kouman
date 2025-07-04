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
            $table->id('idAvis');
            $table->unsignedBigInteger( 'idHebergement');
            $table->unsignedBigInteger( 'id');
            $table->decimal('note', 3, 1);
            $table->text('commentaire')->nullable();
            $table->timestamp('dateAvis')->useCurrent();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('idHebergement')->references('idHebergement')->on('hebergements')->onDelete('cascade');
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

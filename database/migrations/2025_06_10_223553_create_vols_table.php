<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id');
            $table->string('compagnie', 100);
            $table->string('numeroVol', 20);
            $table->string('villeDepart', 100);
            $table->string('villeArrivee', 100);
            $table->dateTime('dateDepart');
            $table->dateTime('dateArrivee');
            $table->decimal('prix', 10, 2);
            $table->string('devise', 3)->default('CFA');
            $table->integer('placesDisponibles')->default(0);
            $table->enum('statut', ['actif', 'inactif'])->default('actif');
            $table->timestamps();
        });
        Schema::table('vols', function (Blueprint $table) {
            $table->unsignedBigInteger('idPartenaire'); // ou partenaire_id selon ta convention
            $table->foreign('idPartenaire')->references('id')->on('partenaires')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};

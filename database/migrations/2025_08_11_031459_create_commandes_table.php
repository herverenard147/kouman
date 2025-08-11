<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable(); // Supprime ->after('id')
            $table->string('ref');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('country');
            $table->text('notes')->nullable();
            $table->enum('payment_method', ['momo', 'card', 'cash']);
            $table->decimal('total', 10, 2);
            $table->decimal('shipping', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};

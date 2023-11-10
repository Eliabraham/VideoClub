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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('movie_id');
            $table->date('rental_date');//dia de renta
            $table->date('return_date'); // dia acordado de devolucion
            $table->date('real_return_date'); // dia real de devolucion
            $table->float('amount_paid'); // monto a pagar
            $table->float('discount'); //descuento
            $table->string('discount_concept',50); //concepto de descuento
            $table->string('return_status',50); // estado de devolucion
            $table->string('status',50); // estado de devolucion
            $table->string('notes',150); // observacion
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};

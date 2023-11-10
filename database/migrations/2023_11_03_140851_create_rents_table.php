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
            $table->date('rental_date');
            $table->date('return_date'); 
            $table->date('real_return_date'); 
            $table->float('amount_paid_daily'); 
            $table->float('discount'); 
            $table->string('discount_concept',50); 
            $table->string('return_status',50); 
            $table->string('status',50); 
            $table->string('notes',150); 
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
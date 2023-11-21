<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->unsignedInteger('duration');
            $table->string('director',30);
            $table->string('genre',30);
            $table->enum('classification',['U','PG', '12A','15A', '18A', '18R']);
            $table->string('poster',60);
            $table->string('synopsis',300);
            $table->string('status',12);
            $table->unsignedInteger('existence');
            $table->unsignedInteger('availability');
            $table->timestamps();
        });
    }
    
    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

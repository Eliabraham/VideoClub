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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->unsignedInteger('duration');
            $table->string('director',30);
            $table->string('gender',30);
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
     * u: todo publico/  pg:supervision  :12a mayor de 12
     * 15a: mayor de 15
     * 18a: mayir de 18
     * 18r: restringido
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

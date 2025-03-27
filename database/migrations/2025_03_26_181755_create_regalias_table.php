<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('regalias', function (Blueprint $table) {
            $table->id();
            $table->decimal('rango_inicial', 10, 2);
            $table->decimal('rango_final', 10, 2);
            $table->decimal('regali', 10, 2);
            $table->foreignId('titulo_id')->constrained('titulos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regalias');
    }
};

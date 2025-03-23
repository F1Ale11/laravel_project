<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_titulo', function (Blueprint $table) {
            $table->unsignedBigInteger('autor_id');
            $table->unsignedBigInteger('titulo_id');

            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade');
            $table->foreign('titulo_id')->references('id')->on('titulos')->onDelete('cascade');

            $table->primary(['autor_id', 'titulo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_titulo');
    }
};

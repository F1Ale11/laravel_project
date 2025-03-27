<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('venta_titulo', function (Blueprint $table) {
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('titulo_id');
            $table->integer('cantidad');
            

            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
            $table->foreign('titulo_id')->references('id')->on('titulos')->onDelete('cascade');

            $table->primary(['venta_id', 'titulo_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta_titulo');
    }
};

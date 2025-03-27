<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('librerias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('calle');
            $table->string('ciudad');
            $table->string('pais');
            $table->string('cp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('librerias');
    }
};

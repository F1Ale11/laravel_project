<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('formato');  // p.ej: jpg, png
            $table->string('tamaño');   // p.ej: 1024x768 o un descriptor
            $table->string('foto');     // URL o nombre del archivo
            $table->foreignId('autor_id')->constrained('autores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fotos');
    }
};

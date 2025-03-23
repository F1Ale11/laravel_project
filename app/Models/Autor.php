<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $fillable = ['nombre', 'apellido', 'email'];

    public function titulos()
    {
        return $this->belongsToMany(Titulo::class, 'autor_titulo');
    }
}

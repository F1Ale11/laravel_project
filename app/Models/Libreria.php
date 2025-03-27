<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libreria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'calle', 'ciudad', 'pais', 'cp'] ;

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}

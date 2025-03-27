<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;

    protected $fillable = [
        'rango_inicial',
        'rango_final',
        'descuento',
        'libreria_id'
    ];

    public function libreria()
    {
        return $this->belongsTo(Libreria::class);
    }
}

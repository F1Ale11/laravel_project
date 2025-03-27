<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalia extends Model
{
    use HasFactory;

    protected $fillable = [
        'rango_inicial',
        'rango_final',
        'regali',
        'titulo_id',
    ];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }

}

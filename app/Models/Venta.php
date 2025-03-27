<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'libreria_id'];

    public function libreria()
    {
        return $this->belongsTo(Libreria::class);
    }

    public function titulos()
    {
        return $this->belongsToMany(Titulo::class, 'venta_titulo')
                    ->withPivot('cantidad');
    }
}

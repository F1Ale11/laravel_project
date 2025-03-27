<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'formato',
        'tamaño',
        'foto',
        'autor_id'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}

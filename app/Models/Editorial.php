<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $table = 'editoriales';

    protected $fillable = ['nombre','ciudad','estado','numero'];

    public function titulos()
    {
        return $this->hasMany(Titulo::class);
    }
}

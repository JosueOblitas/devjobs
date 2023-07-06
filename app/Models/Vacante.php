<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'empresa',
        'ultimo_dia',
        'categoria_id',
        'salario_id',
        'user_id'
    ];
}

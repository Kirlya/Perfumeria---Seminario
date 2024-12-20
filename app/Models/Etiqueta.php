<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    protected $table = 'Etiquetas';

    protected $fillable = [
        'nombre', 'activo'
    ];

    protected $hidden = [
        'activo'
    ];
}

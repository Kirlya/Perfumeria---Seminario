<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'Usuarios';

    protected $fillable = [
        'nombre','apellido','email','contraseña','telefono'
    ];

    protected $hidden = [
        'contraseña','telefono','activo'
    ];
}

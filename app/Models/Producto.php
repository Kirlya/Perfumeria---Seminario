<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'Productos';

    protected $fillable = [
        'nombre','descripcion','precio','imagen','cantidad','marca_id','subcategoria_id'
    ];

    protected $hidden = [
        'cantidad','activo'
    ];
}

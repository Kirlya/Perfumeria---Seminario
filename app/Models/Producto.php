<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'Productos';

    protected $primaryKey = 'codigo';

    protected $fillable = [
        'codigo','nombre','descripcion','precio','imagen','cantidad','cod_marca','subcategoria_id','categoria_id'
    ];

    protected $hidden = [
        'cantidad','activo'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosCarrito extends Model
{
    use HasFactory;

    protected $table = 'productos_carritos';

    protected $fillable = [
        'usuario_id','producto_id','cantidad','precio'
    ];

    protected $hidden = [
        'usuario_id','producto_id','precio'
    ];
}

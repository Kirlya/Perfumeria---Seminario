<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalle_compras';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'array';

    protected $fillable = [
        'N_Factura','N_Linea','cantidad','precio_unit','cod_prod'
    ];
}

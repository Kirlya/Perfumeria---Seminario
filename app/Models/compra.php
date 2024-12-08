<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $primaryKey = 'N_Factura';

    protected $fillable = [
        'N_Factura','fecha','total','usuario','metodoPago','estadoPago'
    ];
}

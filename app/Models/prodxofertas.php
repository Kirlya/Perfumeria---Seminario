<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodxofertas extends Model
{
    use HasFactory;
    //desc_req >= desc_apl
    //desc_req es la cantidad necesaria para aplicar el descuento
    //desc_apl es la cantidad a la que se le aplica el descuento
    //descuento es el % 

    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'array';
    
    protected $fillable = [
        'oferta_id','producto_id','desc_req','desc_apl','descuento'
    ];
}

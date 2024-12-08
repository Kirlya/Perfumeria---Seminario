<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class envio extends Model
{
    use HasFactory;

    protected $table = 'envios';
    protected $primaryKey = 'N_Factura';

    protected $fillable = [
      'N_Factura', 'fecha_envio', 'estado_envio', 'costo_envio', 'calle','numero','barrio','departamento','piso','ciudad','provincia','cp'
    ];

}

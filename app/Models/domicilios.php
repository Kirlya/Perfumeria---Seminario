<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domicilios extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'id','calle','numero','barrio','departamento','piso','cp_id','provincia_id','localidad_id'
    ];
}

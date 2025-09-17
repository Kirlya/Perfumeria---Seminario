<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cps extends Model
{
    use HasFactory;
    protected $table = 'cps';
    //falso un codigo postal puede representar varias ciudades
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'id','codigo','provincia','localidad'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoEnvio extends Model
{
    use HasFactory;

    protected $table = 'estado_envios';

    protected $fillable = [
        'nombre'
    ];
}

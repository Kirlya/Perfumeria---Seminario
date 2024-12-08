<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoPago extends Model
{
    use HasFactory;

    protected $table = 'estado_pagos';

    protected $fillable = [
        'nombre'
    ];
}

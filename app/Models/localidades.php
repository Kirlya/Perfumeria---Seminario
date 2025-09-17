<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localidades extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','nombre','provincia_id'
    ];

}

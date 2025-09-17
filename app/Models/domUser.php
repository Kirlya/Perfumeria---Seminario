<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','usuario_id','dom_id'
    ];
}

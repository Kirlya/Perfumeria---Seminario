<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class modelos extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $increment = false;
    //atributo el atributo que lo diferencia de otro modelo ej: color.
    //valor es referente a atributo
    protected $fillable = [
        'id','producto_id','nombre','atr','valor','cantidad','activo'
    ];
    protected $hidden = [
        'activo'
    ];
}

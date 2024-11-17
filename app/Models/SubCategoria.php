<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Thiagoprz\EloquentCompositeKey\HasCompositePrimaryKey;


class SubCategoria extends Model
{
    use HasFactory;
    //use HasCompositePrimaryKey;

    protected $table = 'sub_categorias';

    //protected $primaryKey = ['id','categoria_id'];

    //protected $keyType = 'array';

    protected $fillable = [
        'id',
        'nombre',
        'categoria_id',
        'activo'
    ];

    protected $hidden = [
        'activo'
    ];

}

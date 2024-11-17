<?php

namespace App\Models;

//use HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;


class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'Usuarios';


    //protected $primaryKey = 'email';
    //public $incrementing = false;
    //protected $keyType = 'string';

    protected $username = 'email';

    protected $fillable = [
        'nombre','apellido','email','contraseña','telefono','roles_id','dni'
    ];

    protected $hidden = [
        'contraseña','telefono','activo','roles_id','remember_token',
    ];

    protected function casts(): array
    {
        return [
            'contraseña' => 'hashed',
        ];
    }
}

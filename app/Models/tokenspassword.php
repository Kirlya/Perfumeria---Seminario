<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokenspassword extends Model
{
    use HasFactory;
    //cuando se necesita recuperar la contraseña se genera un token que es un string este se envia al correo y se pide en la pagina
    //para autorizar el cambio de contraseña
    //una vez correcto pide nueva contrasaña y verificacion si es correcto lo guarda
    protected $fillable = [
        'id','usuario_email','token','fecha'
    ];

    protected $hidden = [
        'token'
    ];
}

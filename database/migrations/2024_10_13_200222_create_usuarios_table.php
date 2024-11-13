<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->decimal('dni',8,0)->unique();
            $table->string('nombre',30);
            $table->string('apellido',30);
            $table->string('telefono',20);
            $table->string('email',40)->unique();
            $table->string('contraseña',255);
            $table->boolean('activo');
            $table->unsignedBigInteger('roles_id');
            $table->timestamps();

            $table->primary('email');
            $table->foreign('roles_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

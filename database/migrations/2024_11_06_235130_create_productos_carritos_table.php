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
        Schema::create('productos_carritos', function (Blueprint $table) {
            //usar codigo producto y correo
            $table->decimal('producto_id',8,0);
            $table->string('usuario_id',40);
            $table->decimal('cantidad',5,0);
            $table->decimal('precio',10,2);
            $table->timestamps();

            $table->foreign('producto_id')->references('codigo')->on('productos');
            $table->foreign('usuario_id')->references('email')->on('usuarios');
            $table->primary(['usuario_id','producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_carritos');
    }
};

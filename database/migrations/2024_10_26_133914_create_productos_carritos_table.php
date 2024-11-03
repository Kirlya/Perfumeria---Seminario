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
            $table->id();
            //usar codigo producto y correo
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('usuario_id');
            $table->decimal('cantidad',5,0);
            $table->decimal('precio',10,2);
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
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

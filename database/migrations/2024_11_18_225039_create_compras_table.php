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
        Schema::create('compras', function (Blueprint $table) {
            $table->decimal('N_Factura',10,0);
            $table->date('fecha');
            $table->decimal('total',8,2);
            $table->unsignedBigInteger('usuario');
            $table->unsignedBigInteger('metodoPago');
            $table->unsignedBigInteger('estadoPago');
            $table->timestamps();

            $table->primary('N_Factura');
            $table->foreign('usuario')->references('id')->on('usuarios');
            $table->foreign('metodoPago')->references('id')->on('metodo_pagos');
            $table->foreign('estadoPago')->references('id')->on('estado_pagos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};

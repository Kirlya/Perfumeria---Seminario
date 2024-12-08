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
        Schema::create('envios', function (Blueprint $table) {
            $table->decimal('N_Factura',10,0);
            $table->date('fecha_envio')->nullable();
            $table->unsignedBigInteger('estado_envio');
            $table->decimal('costo_envio',8,0);
            $table->string('calle');
            $table->integer('numero');
            $table->string('barrio')->nullable();
            $table->string('departamento')->nullable();
            $table->string('piso')->nullable();
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('cp');
            $table->timestamps();

            $table->primary('N_Factura');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};

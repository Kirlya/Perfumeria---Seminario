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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->decimal('N_Factura',10,0);
            $table->integer('N_Linea');
            $table->decimal('cantidad',5,0);
            $table->decimal('precio_unit',10,2);
            $table->decimal('cod_prod',8,0);
            $table->timestamps();

            $table->primary(['N_Factura','N_Linea']);
            $table->foreign('N_Factura')->references('N_Factura')->on('compras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};

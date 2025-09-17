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
        Schema::create('prodxofertas', function (Blueprint $table) {
            $table->decimal('producto_id',8,0);
            $table->unsignedBigInteger('oferta_id');
            $table->decimal('desc_req',1,0);
            $table->decimal('desc_apl',1,0);
            $table->decimal('descuento',3,0);

            $table->timestamps();

            $table->foreign('producto_id')->references('codigo')->on('productos');
            $table->foreign('oferta_id')->references('id')->on('ofertas');
            $table->primary(['oferta_id','producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodxofertas');
    }
};

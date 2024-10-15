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
        Schema::create('favoritos', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('producto_id');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->primary(['usuario_id','producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};

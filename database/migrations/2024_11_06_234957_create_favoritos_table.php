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
            $table->string('usuario_id',40);
            $table->decimal('producto_id',8,0);
            $table->timestamps();

            $table->foreign('usuario_id')->references('email')->on('usuarios');
            $table->foreign('producto_id')->references('codigo')->on('productos');
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
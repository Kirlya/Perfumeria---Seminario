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
        Schema::create('productos', function (Blueprint $table) {
            $table->decimal('codigo',8,0);
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->decimal('precio',10,2);
            $table->decimal('cantidad',5,0);
            $table->string('imagen');
            $table->boolean('activo');
            $table->string('cod_marca',3);
            $table->unsignedBigInteger('subcategoria_id');
            //$table->unsignedBigInteger('categoria_id');
            $table->timestamps();


            $table->primary('codigo');
            $table->foreign('cod_marca')->references('codigo')->on('marcas');
            $table->foreign('subcategoria_id')->references('id')->on('sub_categorias');
            //$table->foreign(['subcategoria_id','categoria_id'])->references(['id','categoria_id'])->on('sub_categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

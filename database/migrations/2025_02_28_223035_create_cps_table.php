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
        //'id','codigo','provincia','localidad'
        Schema::create('cps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('localidad_id');
            $table->timestamps();

            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cps');
    }
};

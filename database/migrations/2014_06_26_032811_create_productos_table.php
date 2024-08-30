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
            $table->bigIncrements('idProducto');
            $table->string('pronombre');
            $table->string('prodescripcion');
            $table->string('propreciounitario')->nullable();
            $table->string('propreciocompra');
            $table->integer('prostock');
            $table->integer('prostockminimo');
            $table->unsignedBigInteger('idTipoproducto');
            $table->foreign('idTipoproducto')->references('idTipoproducto')->on('tipo_productos')->onDelete('cascade');
            $table->unsignedBigInteger('idUnidadmedida');
            $table->foreign('idUnidadmedida')->references('idUnidadmedida')->on('unidadmedidas')->onDelete('cascade');

            $table->timestamps();
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

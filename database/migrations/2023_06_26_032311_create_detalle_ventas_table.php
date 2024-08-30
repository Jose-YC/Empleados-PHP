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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('idDventa');

            $table->unsignedBigInteger('idVenta');
            $table->foreign('idVenta')->references('idVenta')->on('ventas')->onDelete('cascade');
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('idProducto')->on('productos')->onDelete('cascade');
            $table->string('dvcantidad');
            $table->string('dvpreciounitario');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};

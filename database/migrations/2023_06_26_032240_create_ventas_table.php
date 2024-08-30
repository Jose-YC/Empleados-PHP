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
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('idVenta');
            $table->string('venfecha');
            $table->string('vendocumentocliente')->nullable();
            $table->string('venhora');
            $table->string('venestado')->default('pagado');
            $table->string('venmonto');
            $table->string('venimpuesto');
            $table->string('ventotalneto');
            $table->string('venobservacion')->nullable();
            $table->unsignedBigInteger('idTipocomprobante');
            $table->foreign('idTipocomprobante')->references('idTipocomprobante')->on('tipo_comprobante_ventas')->onDelete('cascade');
            $table->unsignedBigInteger('idTipopago');
            $table->foreign('idTipopago')->references('idTipopago')->on('tipo_pagos')->onDelete('cascade');
            $table->unsignedBigInteger('idEmpleado');
            $table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};

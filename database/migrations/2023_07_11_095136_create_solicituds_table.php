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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->bigIncrements('idSolicitud');
            $table->string('solnombre');
            $table->string('solarchivo');
            $table->integer('solcantidad')->nullable();
            $table->string('soldescripcion');
            $table->string('solobservacion')->nullable();
            $table->enum('solestado', ['aprobado', 'observado', 'pendiente','entregado','proceso'])->default('pendiente');
            $table->unsignedBigInteger('idEmpleado');
            $table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('idDepartamento');
            $table->foreign('idDepartamento')->references('idDepartamento')->on('departamentos')->onDelete('cascade');
            $table->unsignedBigInteger('solicitudable_id')->nullable();
            $table->string('solicitudable_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};

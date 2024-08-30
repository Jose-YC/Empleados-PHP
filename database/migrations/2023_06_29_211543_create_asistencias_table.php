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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->bigIncrements('idAsistencia');
            $table->unsignedBigInteger('idEmpleado');
            $table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('idCapacitacion');
            $table->foreign('idCapacitacion')->references('idCapacitacion')->on('capacitacions')->onDelete('cascade');
            $table->unsignedBigInteger('idDepartamento');
            $table->foreign('idDepartamento')->references('idDepartamento')->on('departamentos')->onDelete('cascade');
            $table->enum('asistio', ['si', 'no', 'justifico'])->nullable();
            $table->string('justificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};

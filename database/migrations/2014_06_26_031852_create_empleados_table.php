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
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('idEmpleado');
            $table->string('empnombres');
            $table->string('empapellidop');
            $table->string('empapellidom');
            $table->string('empdni');
            $table->string('empdireccion');
            $table->string('emptelefono');
            $table->unsignedBigInteger('idDepartamento');
            $table->foreign('idDepartamento')->references('idDepartamento')->on('departamentos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};

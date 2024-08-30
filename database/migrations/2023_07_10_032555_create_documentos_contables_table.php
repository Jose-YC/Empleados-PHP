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
        Schema::create('documentos_contables', function (Blueprint $table) {
            $table->bigIncrements('idDocumentocontable');
            $table->string('dconnombre');
            $table->string('dconfecha');
            $table->string('dconhora');
            $table->string('dconurl');
            $table->unsignedBigInteger('idEmpleado');
            $table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('docontable_id');
            $table->string('docontable_type');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_contables');
    }
};

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
        Schema::create('capacitacions', function (Blueprint $table) {
            $table->bigIncrements('idCapacitacion');
            $table->string('capfechainicio');
            $table->string('capfechafin');
            $table->string('capcapacitador');
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
        Schema::dropIfExists('capacitacions');
    }
};

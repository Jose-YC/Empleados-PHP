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
        Schema::create('financieros', function (Blueprint $table) {
            $table->bigIncrements('idFinanciero');
            $table->string('finanio');
            $table->string('fintipo');
            $table->integer('idcomprobante');
            $table->unsignedBigInteger('idEstadofinanciero');
            $table->foreign('idEstadofinanciero')->references('idEstadofinanciero')->on('estados_financieros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financieros');
    }
};

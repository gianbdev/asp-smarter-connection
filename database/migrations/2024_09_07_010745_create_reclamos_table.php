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
        Schema::create('reclamos', function (Blueprint $table) {
            $table->id('reclamoID'); // Clave primaria para 'reclamos'
            $table->string('nombres_cliente');
            $table->string('apellidos_cliente');
            $table->string('dni_cliente')->nullable();
            $table->string('telefono_cliente')->nullable();
            $table->string('correo_cliente');
            $table->string('sexo');
            // Asegúrate de que 'productoID' esté definido como unsignedBigInteger
            $table->unsignedBigInteger('productoID');
            $table->foreign('productoID')->references('productoID')->on('productos')->onDelete('cascade');
            $table->string('tipo_reclamo');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamos');
    }
};

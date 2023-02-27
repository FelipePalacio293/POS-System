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
        Schema::create('Ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('NumeroProductos');
            $table->integer('TotalItems');
            $table->integer('TotalParcial');
            $table->decimal('iva');
            $table->decimal('TotalDescuento')->nullable();
            $table->decimal('TotalVenta');
            $table->timestamp('FechaDeVenta');
            $table->unsignedBigInteger('IdVendedor');
            $table->foreign('IdVendedor')->references('id')->on('Vendedores')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('IdCliente');
            $table->foreign('IdCliente')->references('id')->on('Clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ventas');
    }
};

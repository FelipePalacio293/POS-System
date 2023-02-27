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
        Schema::create('DetalleVentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CodigoProducto');
            $table->foreign('CodigoProducto')->references('CodigoProducto')->on('Items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('CantidadProducto');
            $table->decimal('PrecioItem');
            $table->decimal('TotalDescuentoItem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DetalleVentas');
    }
};

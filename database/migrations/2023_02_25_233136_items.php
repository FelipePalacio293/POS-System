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
        Schema::create('Items', function (Blueprint $table) {
            $table->unsignedBigInteger('CodigoProducto')->primary();
            $table->bigInteger('CodigoDeBarras')->nullable();
            $table->decimal('PrecioProducto');
            $table->string('NombreProducto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Items');
    }
};

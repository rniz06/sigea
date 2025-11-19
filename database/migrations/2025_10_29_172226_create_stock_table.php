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
        Schema::create('compras.stock', function (Blueprint $table) {
            $table->unsignedInteger('stock_cantidad')->default(0);
            $table->integer('stock_minimo')->nullable();
            $table->integer('stock_maximo')->nullable();
            $table->foreignId('item_cod')->constrained('compras.items', 'item_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('suc_cod')->constrained('sucursal', 'suc_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('emp_cod')->constrained('empresa', 'emp_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('deposito_cod')->constrained('compras.deposito', 'deposito_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('creadoPor')->nullable()->constrained('public.users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('actualizadoPor')->nullable()->constrained('public.users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras.stock');
    }
};

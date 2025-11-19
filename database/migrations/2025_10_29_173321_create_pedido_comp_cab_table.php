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
        Schema::create('compras.pedido_comp_cab', function (Blueprint $table) {
            $table->id('ped_cod');
            $table->date('ped_com_fecha');
            $table->date('ped_com_plazo_entrega')->nullable();
            $table->string('ped_comp_obs')->nullable();
            $table->enum('ped_comp_estado', ['PENDIENTE', 'APROBADO', 'RECHAZADO'])->default('PENDIENTE');
            $table->foreignId('suc_cod')->constrained('sucursal', 'suc_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('emp_cod')->constrained('empresa', 'emp_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('creadoPor')->nullable()->constrained('public.users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('actualizadoPor')->nullable()->constrained('public.users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras.pedido_comp_cab');
    }
};

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
        Schema::create('pres_prov_cab', function (Blueprint $table) {
            $table->id('pres_prov_cod');
            $table->date('pres_prov_fecha');
            $table->enum('pres_prov_estado', ['PENDIENTE', 'APROBADO', 'RECHAZADO'])->default('PENDIENTE');
            $table->date('pres_prov_plazo_entrega')->nullable();
            $table->string('pres_prov_obs')->nullable();
            $table->foreignId('suc_cod')->constrained('sucursal', 'suc_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('emp_cod')->constrained('empresa', 'emp_cod')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('pres_prov_cab');
    }
};

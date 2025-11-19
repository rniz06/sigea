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
        Schema::create('compras.proveedor', function (Blueprint $table) {
            $table->id('prov_cod');
            $table->string('prov_razonsocial', 50);
            $table->string('prov_direcc', 100)->nullable();
            $table->string('prov_ruc', 20);
            $table->string('prov_telef', 20)->nullable();
            $table->string('prov_correo', 50)->nullable();
            $table->foreignId('ciu_cod')->constrained('ciudad', 'ciu_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('pais_cod')->constrained('pais', 'pais_cod')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('compras.proveedor');
    }
};

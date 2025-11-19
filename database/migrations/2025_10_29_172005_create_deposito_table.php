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
        Schema::create('compras.deposito', function (Blueprint $table) {
            $table->id('deposito_cod');
            $table->string('deposito_descrip', 100);
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
        Schema::dropIfExists('compras.deposito');
    }
};

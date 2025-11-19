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
        Schema::create('compras.motivo_ajuste', function (Blueprint $table) {
            $table->id('mot_ajus_cod');
            $table->string('mot_ajus_desci', 50);
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
        Schema::dropIfExists('compras.motivo_ajuste');
    }
};

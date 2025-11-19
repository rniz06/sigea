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
        Schema::create('compras.items', function (Blueprint $table) {
            $table->id('item_cod');
            $table->string('item_descri', 50);
            $table->integer('item_precio');
            $table->foreignId('tipo_item_cod')->constrained('compras.tipo_items', 'tipo_item_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('tipo_imp_cod')->constrained('tipo_impuesto', 'tipo_imp_cod')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('compras.items');
    }
};

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
        Schema::create('compras.pedido_comp_det', function (Blueprint $table) {
            $table->integer('ped_com_cantidad');
            $table->foreignId('ped_cod')->constrained('compras.pedido_comp_cab', 'ped_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('item_cod')->constrained('compras.items', 'item_cod')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras.pedido_comp_det');
    }
};

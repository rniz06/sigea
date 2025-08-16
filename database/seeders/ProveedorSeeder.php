<?php

namespace Database\Seeders;

use App\Models\Compras\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores = Proveedor::factory()->count(100)->create();
    }
}

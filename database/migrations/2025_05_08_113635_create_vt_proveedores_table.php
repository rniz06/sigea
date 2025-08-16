<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW vt_proveedores AS
                SELECT p.id,
                p.prov_razonsocial,
                p.prov_ruc,
                p.prov_direccion,
                p.prov_telefono,
                p.prov_correo,
                c.ciu_descripcion,
                p.deleted_at,
                p.ciudad_id
            FROM proveedores p
                JOIN ciudades c ON p.ciudad_id = c.id;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vt_proveedores');
    }
};

<?php

namespace App\Models\Compras;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    
    protected $table = "proveedores";

    protected $fillable = [
        'prov_razonsocial',
        'prov_ruc',
        'prov_direccion',
        'prov_telefono',
        'prov_correo',
        'ciudad_id',
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }
}

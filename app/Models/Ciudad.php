<?php

namespace App\Models;

use App\Models\Compras\Proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use SoftDeletes;
    
    protected $table = "ciudades";

    protected $fillable = [
        'ciu_descripcion',
        'pais_id',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'ciudad_id');
    }
}

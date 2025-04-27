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

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        $query->where('prov_razonsocial', 'like', "%{$value}%")
        ->orWhere('prov_ruc', 'like', "%{$value}%")
        ->orWhere('prov_direccion', 'like', "%{$value}%")
        ->orWhere('prov_telefono', 'like', "%{$value}%")
        ->orWhere('prov_correo', 'like', "%{$value}%")
        ->orWhere('ciudad_id', 'like', "%{$value}%");
    }

    public function scopeBuscadorRazonsocial($query, $value)
    {
        $query->where('prov_razonsocial', 'like', "%{$value}%");
    }

    public function scopeBuscadorRuc($query, $value)
    {
        $query->where('prov_ruc', 'like', "%{$value}%");
    }

    public function scopeBuscadorDireccion($query, $value)
    {
        $query->where('prov_direccion', 'like', "%{$value}%");
    }

    public function scopeBuscadorTelefono($query, $value)
    {
        $query->where('prov_telefono', 'like', "%{$value}%");
    }

    public function scopeBuscadorCorreo($query, $value)
    {
        $query->where('prov_correo', 'like', "%{$value}%");
    }

    public function scopeBuscadorCiudad($query, $value)
    {
        $query->where('ciudad_id', 'like', "%{$value}%");
    }
}

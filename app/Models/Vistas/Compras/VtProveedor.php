<?php

namespace App\Models\Vistas\Compras;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtProveedor extends Model
{
    use SoftDeletes;
    
    protected $table = "vt_proveedores";
}

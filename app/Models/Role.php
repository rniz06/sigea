<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorName($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador campo created_at.
     */
    public function scopeBuscadorCreatedat($query, $value)
    {
        $query->where('created_at', 'like', "%{$value}%");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use SoftDeletes;

    protected $table = "paises";

    protected $fillable = [
        'pais_descrpcion',
        'pais_gentilicio',
        'pais_siglas'
    ];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'pais_id');
    }
}

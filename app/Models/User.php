<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
        ->orWhere('email', 'like', "%{$value}%")
        ->orWhere('username', 'like', "%{$value}%")
        ->orWhere('created_at', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorName($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorEmail($query, $value)
    {
        $query->where('email', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorUsername($query, $value)
    {
        $query->where('username', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorCreatedat($query, $value)
    {
        $query->where('created_at', 'like', "%{$value}%");
    }
}

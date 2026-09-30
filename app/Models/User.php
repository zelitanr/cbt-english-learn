<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public const DAFTAR_ROMBEL = [
        'PPLG XI-2', 'PPLG XI-2',
        'PPLG XI-3', 'PPLG XI-4',
        'PPLG XI-5', 
    ];

    protected $fillable = ['name','nis','email','username','password','role','rombel','foto_profil'];

    protected $hidden = ['password','remember_token'];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    public function isAdmin(): bool { return $this->role === 'admin'; }
}
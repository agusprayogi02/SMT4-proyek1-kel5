<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relasi one to one with smk
    public function smk()
    {
        return $this->hasOne(Smk::class, 'user_id', 'id');
    }

    // relasi one to one with siswa
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'user_id', 'id');
    }

    // relasi one to one with guru
    public function guru()
    {
        return $this->hasOne(Guru::class, 'user_id', 'id');
    }

    // relasi one to one with dudi
    public function dudi()
    {
        return $this->hasOne(Dudi::class, 'user_id', 'id');
    }
}

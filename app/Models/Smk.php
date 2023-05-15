<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smk extends Model
{
    use HasFactory;

    // relasi one to one with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // relasi one to many with siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'smk_id', 'id');
    }

    // relasi one to many with guru
    public function guru()
    {
        return $this->hasMany(Guru::class, 'smk_id', 'id');
    }
}

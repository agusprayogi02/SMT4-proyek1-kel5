<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // relasi one to one with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // relasi one to many with smk
    public function smk()
    {
        return $this->belongsTo(Smk::class, 'smk_id', 'id');
    }

    // relasi one to many with kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $primaryKey = 'nip';
    protected $keyType = 'string';
    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'no_telp',
        'user_id',
        'smk_id',
    ];

    // relasi one to one with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // relasi one to many with smk
    public function smk()
    {
        return $this->belongsTo(Smk::class, 'smk_id', 'npsn');
    }

    // relasi one to many with daftar magang
    public function daftarMagang()
    {
        return $this->hasMany(DaftarMagang::class, 'guru_id', 'nip');
    }
}

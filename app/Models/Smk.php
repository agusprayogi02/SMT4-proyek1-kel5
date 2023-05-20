<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smk extends Model
{
    use HasFactory;
    protected $primaryKey = 'npsn';
    protected $keyType = 'string';
    protected $fillable = [
        'npsn',
        'nama',
        'alamat',
        'no_telp',
        'user_id',
        'kepala_sekolah',
        "verified_at"
    ];
    protected $guarded = [];

    // relasi one to one with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // relasi one to many with siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'smk_id', 'npsn');
    }

    // relasi one to many with guru
    public function gurus()
    {
        return $this->hasMany(Guru::class, 'smk_id', 'npsn');
    }
}

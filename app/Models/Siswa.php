<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'nisn';
    protected $keyType = 'string';

    protected $fillable = [
        'nisn',
        'kelas_id',
        'smk_id',
        'nama',
        'alamat',
        'agama',
        'no_telp',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
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

    // relasi one to many with kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    //relasi one to many with laporan
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    //relasi one to many with daftar magang
    public function daftarMagang()
    {
        return $this->hasMany(DaftarMagang::class, 'siswa_id', 'nisn');
    }

    //relasi one to many with nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id', 'nisn');
    }
}

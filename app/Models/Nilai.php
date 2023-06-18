<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id', 'dudi_id', 'avg', 'total', 'applied_job', 'sertifikat'];
    // protected $fillable = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nisn');
    }

    public function dudi()
    {
        return $this->belongsTo(Dudi::class, 'dudi_id', 'nib');
    }

    function kategoriNilai()
    {
        return $this->hasMany(NilaiKategori::class, 'nilai_id', 'id');
    }
}

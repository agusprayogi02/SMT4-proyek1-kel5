<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'rekomendasi',
        'alasan',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'nisn');
    }

    public function dudi()
    {
        return $this->belongsTo(Dudi::class, 'dudi_id', 'nib');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'nip');
    }

    public function keahlian()
    {
        return $this->belongsTo(Keahlian::class, 'keahlian_id', 'id');
    }
}

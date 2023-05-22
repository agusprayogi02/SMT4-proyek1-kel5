<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanHarian extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'tanggal',
        'kegiatan',
        'image',
        'keterangan',
    ];

    //relasi siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id', 'dudi_id', 'avg', 'total', 'applied_job', 'sertifikat'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function dudi()
    {
        return $this->belongsTo(Dudi::class);
    }
}

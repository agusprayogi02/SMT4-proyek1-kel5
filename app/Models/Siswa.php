<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswas";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nisn',
        'user_id',
        'kelas_id',
        'smk_id',
        'alamat',
        'no_telp',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
    ];
}

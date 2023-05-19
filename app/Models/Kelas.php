<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // relasi one to many with siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}

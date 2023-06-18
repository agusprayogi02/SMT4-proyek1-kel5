<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nilai_id',
        'kategori_id',
        'nilai',
        'keterangan',
    ];

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'nilai_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }
}

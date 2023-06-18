<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function nilaiKategori()
    {
        return $this->hasMany(NilaiKategori::class, 'kategori_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;
    protected $primaryKey = 'nib';
    protected $keyType = 'string';
    protected $fillable = [
        'nib',
        'user_id',
        'nama',
        'nama_pemilik',
        'alamat',
        'no_telp',
        'kuota',
    ];

    // relasi one to one with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

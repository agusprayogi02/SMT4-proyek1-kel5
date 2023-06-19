<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DudiKeahlian extends Model
{
    use HasFactory;
    protected $fillable = ['dudi_id', 'keahlian_id'];
}

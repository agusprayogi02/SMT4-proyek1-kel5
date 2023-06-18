<?php

namespace App\Helper;

use App\Models\Dudi;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Smk;

class Helper
{
  public static function  profileLink(): string
  {
    $role = strtolower(Helper::roleName());
    if ($role == 'smk') {
      $smk = Smk::where('user_id', auth()->user()->id)->first();
      return route('smk.edit', $smk->npsn);
    } else if ($role == 'guru') {
      $guru = Guru::where('user_id', auth()->user()->id)->first();
      return route('guru.edit', $guru->nip);
    } else if ($role == 'dudi') {
      $dudi = Dudi::where('user_id', auth()->user()->id)->first();
      return route('dudi.edit', $dudi->nib);
    } else if ($role == 'siswa') {
      $siswa = Siswa::where('user_id', auth()->user()->id)->first();
      return route('siswa.edit', $siswa->nisn);
    }
    return route('home');
  }

  public static function roleName(): string
  {
    return auth()->user()->roles[0]->name;
  }
}

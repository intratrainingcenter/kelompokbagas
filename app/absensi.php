<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
  protected $table = 'absensis';
  protected $fillable = [
    'nis','nama_siswa', 'presensi','keterangan'
];
}

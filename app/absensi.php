<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
  protected $fillable = [
    'id','nis','nama_siswa', 'presensi','keterangan'
];
}

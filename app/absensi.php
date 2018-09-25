<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
  protected $table = 'absensis';
  protected $fillable = [
    'id_siswa','presensi', 'keterangan'

];
public function join_to_siswa(){
   return $this->belongsTo('App\siswa','id_siswa','id');
 }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
  protected $table = 'siswas';
  protected $fillable = [
    'id_kelas','id_jadwalpiket', 'nis','nama_siswa','jenis_klamin','tempat_tanggal_lahir'
];
public function join_class(){
   return $this->belongsTo('App\kelas','id_kelas','id');
 }
public function join_to_picket(){
   return $this->belongsTo('App\jadwalpiket','id_jadwalpiket','id');
 }

}

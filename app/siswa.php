<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
  protected $table = 'siswas';
  protected $fillable = [
    'id_kelas', 'nis','nama_siswa','jenis_klamin','tempat_tanggal_lahir'
];
public function join_class(){
   return $this->belongsTo('App\kelas','id_kelas','id');
 }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
  protected $table = 'kelas';
  protected $fillable = [
    'id_siswa','id_jadwalpiket','kode_kelas'
];
public function join_to_student(){
   return $this->belongsTo('App\siswa','id_siswa','id');
 }
public function join_picket(){
   return $this->belongsTo('App\jadwalpiket','id_jadwalpiket','id');
 }
}

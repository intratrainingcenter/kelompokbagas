<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
  protected $table = 'kelas';
  protected $fillable = [
    'id_siswa','kode_kelas'

];
public function join_to_siswa(){
  return $this->belongsTo('App\siswa','id_siswa','id');
}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matapelajaran extends Model
{
  protected $table = 'matapelajarans';
  protected $fillable = [
    'id_kelas','kode_pelajaran','nama_pelajaran','jam'
];

public function join_to_class(){
   return $this->belongsTo('App\kelas','id_kelas','id');
 }
}

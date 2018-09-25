<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
  protected $table = 'siswas';
  protected $fillable = [
    'id_kelas','id_absensis', 'id_jadwalpikets','nis','nama','kelas'
];

public function join_absensi(){
   return $this->belongsTo('App\absensi','id_absensis','id');
 }

}

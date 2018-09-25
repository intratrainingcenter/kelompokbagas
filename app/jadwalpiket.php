<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwalpiket extends Model
{

    protected $table = 'jadwalpikets';
    protected $fillable = [
      'id_siswa','hari'

  ];
}

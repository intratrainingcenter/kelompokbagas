<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'kelas';
    protected $primary = 'id';
    protected $fillable = [
        'id','nama_kelas','nama_wali_kelas', 'ketua_kelas',
    ];
}

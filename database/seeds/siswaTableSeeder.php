<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class siswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('siswas')->insert([
    [
    'id_kelas'=> '1',
    'id_jadwalpikets'=> '1',
    'id_absensis'=> '1',
    'nis'=> '192.168.34.247',
    'nama_siswa'=> 'Jono',
    'jenis_klamin'=> 'Laki-Laki',
    'tempat_tanggal_lahir'=> '06.12.1899',
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
  ],
  [
'id_kelas'=> '1',
'id_jadwalpikets'=> '1',
'id_absensis'=> '2',
'nis'=> '192.168.34.247',
'nama_siswa'=> 'jabal',
'jenis_klamin'=> 'Laki-Laki',
'tempat_tanggal_lahir'=> '06.12.1555',
'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]
]);
    }
}

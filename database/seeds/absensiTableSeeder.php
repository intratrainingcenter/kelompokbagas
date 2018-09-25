<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;


class absensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('absensis')->insert([
        [
          'id_siswa'=> '1',
          'nis'=> '192.168.34.247',
          'nama_siswa'=> 'Jono',
          'presensi'=> 'Sakit',
          'keterangan'=>  'Diabetes di rawat 4 bulan',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
          'id_siswa'=> '1',
          'nis'=> '192.168.34.247',
          'nama_siswa'=> 'jamal',
          'presensi'=> 'Sakit',
          'keterangan'=>  'Mag',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
  ]);


    }
}

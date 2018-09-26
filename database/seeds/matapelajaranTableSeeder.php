<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class matapelajaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('matapelajarans')->insert([
    [
    'kode_pelajaran'=> 'b77',
    'id_kelas'=> '1',
    'nama_pelajaran'=> 'Bahasa Inggris',
    'jam'=> '1-2',
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
  ],
  [
'kode_pelajaran'=> 'b3',
'id_kelas'=> '2',
'nama_pelajaran'=> 'Bahasa Indonesia',
'jam'=> '3-5',
'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]
]);
    }
}

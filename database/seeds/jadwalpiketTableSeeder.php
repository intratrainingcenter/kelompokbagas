<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class jadwalpiketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('jadwalpikets')->insert([
    [
    'id_siswa'=> '1',
    'hari'=> 'Selasa',
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
  ],
  [
'id_siswa'=> '2',
'hari'=> 'Senin',
'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]
]);
    }
}

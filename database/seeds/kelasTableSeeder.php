<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class kelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kelas')->insert([
        [
          'wali_kelas'=> 'Ibu Frida',
          'kode_kelas'=> '5B',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
          'wali_kelas'=> 'Bapak Fredy',
          'kode_kelas'=> '6A',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
  ]);
    }
}

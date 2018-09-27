<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(absensiTableSeeder::class);
       $this->call(siswaTableSeeder::class);
       $this->call(jadwalpiketTableSeeder::class);
       $this->call(kelasTableSeeder::class);
       $this->call(matapelajaranTableSeeder::class);
    }
}

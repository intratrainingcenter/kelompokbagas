<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('content.content');
})->middleware('testMiddleware');

// Route::get('/nama/{id}', function($id){
//   return $id;
// });
// Route::get('/datasiswa', function(){
//   return view('content/datasiswa/datasiswa');
// });
// Route::get('/siswa', function(){
//   return view('content/siswa/siswa');
// });
// Route::get('/kelas', function(){
//   return view('content/kelas/kelas');
// });
// Route::get('/matapelajaran', function(){
//   return view('content/matapelajaran/matapelajaran');
// });
// Route::get('/absen', function(){
//   return view('content/absen/absen');
// });
// Route::get('/jadwalpiket', function(){
//   return view('content/jadwalpiket/jadwalpiket');
// });
Route::resource('seluruh', 'testcontrollerApi');
Route::resource('absen','absensiControler');
Route::resource('siswa','siswaController');
Route::resource('mapel','mapelController');
Route::resource('jadwalpiket','jadwalpiketController');
Route::resource('kelas','kelasController');

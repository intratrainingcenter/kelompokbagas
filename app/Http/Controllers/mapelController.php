<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matapelajaran;
use App\kelas;

class mapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subjects = matapelajaran::with('join_to_class', 'join_to_picket')->get();
      // print_r($attendance[0]->join_to_siswa->nis);
      // dd($subjects);
      return view('content/matapelajaran/matapelajaran', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $subjects = new matapelajaran;
      $subjects->kode_pelajaran = $request->kode_pelajaran;
      $subjects->nama_pelajaran = $request->nama_pelajaran;
      $subjects->jam = $request->jam;
      $subjects->id_kelas =  $request->kelas;
      $subjects->save();
      return redirect()->route('mapel.index')
      ->with('success','Matapelajaran created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $subjects = matapelajaran::with('join_to_class')->where('id', $id)->first();
      // dd($subjects);
      // dd($class);
      $class = kelas::get();
      return View('content/matapelajaran/matapelajaran_edit',compact('subjects','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $subjects = matapelajaran::find($id);
      $subjects->kode_pelajaran = $request->kode_pelajaran;
      $subjects->nama_pelajaran = $request->nama_pelajaran;
      $subjects->jam = $request->jam;
      $subjects->id_kelas =  $request->kelas;
      $subjects->save();
      // dd($student);
      // return view('content/absen/absen', compact('absensi'));
      // return redirect('absen');
      return redirect()->route('mapel.index')
      ->with('edit','Matapelajaran update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $subjects = matapelajaran::find($id);
      $subjects->delete();
      // dd($attendance);
      return redirect()->route('mapel.index')->with('delete','Matapelajaran deleted successfully');
    }
}

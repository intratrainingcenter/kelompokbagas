<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $class = kelas::all();
      // dd($student);
      // dd($class);
      return View('content/kelas/kelas',compact('class'));
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
      $class = new kelas;
      $class->wali_kelas = $request->wali_kelas;
      $class->kode_kelas = $request->kelas;
      $class->save();
      return redirect()->route('kelas.index')
      ->with('success','kelas created successfully');
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
      $class = kelas::all()->where('id', $id)->first();
      // dd($student);
      // dd($class);
      return View('content/kelas/kelas_edit',compact('class'));
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
      $class = kelas::find($id);
      $class->wali_kelas = $request->wali_kelas;
      $class->kode_kelas = $request->kelas;
      $class->save();
      // dd($student);
      // return view('content/absen/absen', compact('absensi'));
      // return redirect('absen');
      return redirect()->route('kelas.index')
      ->with('edit','siswa update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $attendance = kelas::find($id);
      $attendance->delete();
      // dd($attendance);
      return redirect()->route('kelas.index')->with('delete','kelas deleted successfully');
    }
}

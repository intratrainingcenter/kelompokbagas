<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\siswa;
use App\kelas;
use App\jadwalpiket;
class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = siswa::with('join_class')->get();
        // dd($student);
        $class = kelas::get();
        $picket = jadwalpiket::get();
        // dd($class);
        return View('content/siswa/siswa',compact('student','class','picket'));
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
    $student = new siswa;
    $student->nis = $request->nis;
    $student->nama_siswa = $request->nama_siswa;
    $student->jenis_klamin = $request->jenis_klamin;
    $student->tempat_tanggal_lahir = $request->tanggal_lahir;
    $student->id_kelas =  $request->kelas;
    $student->id_jadwalpiket =  $request->jadwalpiket;
    $student->save();
    return redirect()->route('siswa.index')
    ->with('success','siswa created successfully');

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
      $student = siswa::with('join_class')->where('id', $id)->first();
      // dd($student);
      $class = kelas::get();
      $picket = jadwalpiket::get();
      // dd($class);
      return View('content/siswa/siswa_edit',compact('student','class','picket'));
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
      $student = siswa::find($id);
      $student->nis = $request->nis;
      $student->nama_siswa = $request->nama_siswa;
      $student->jenis_klamin = $request->jenis_klamin;
      $student->tempat_tanggal_lahir = $request->tanggal_lahir;
      $student->id_kelas =  $request->kelas;
      $student->id_jadwalpiket =  $request->jadwalpiket;
      $student->save();
      // dd($student);
      // return view('content/absen/absen', compact('absensi'));
      // return redirect('absen');
      return redirect()->route('siswa.index')
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
      $attendance = siswa::find($id);
      $attendance->delete();
      // dd($attendance);
      return redirect()->route('siswa.index')->with('delete','siswa deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
use App\siswa;
class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $class = kelas::with('join_to_student')->get();
      // dd($student);
      $student = siswa::get();
      // dd($class);
      return View('content/kelas/kelas',compact('class','student'));
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
      //script sulit
      $find = siswa::where('nis', $request->nis)->first();
      // dd($find->nama_siswa);
      if ($find != null) {
        $getsiswa = siswa::where('nis', $request->nis)->first();
        $id_siswa = $getsiswa->id;
        kelas::create([
          'id_siswa' => $id_siswa,
          'kode_kelas' => request()->get('kelas'),
        ]);
        return redirect()->route('kelas.index')
        ->with('success','kelas created successfully');
      }else {
        return redirect()->route('kelas.index')
        ->with('not_success','kelas not created successfully');
      }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

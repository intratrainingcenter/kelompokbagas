<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\absensi;

class absensiControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $absensi = absensi::all();
      // dd($absensi);
      return view('content/absen/absen', compact('absensi'));
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
      absensi::create([
      'nis' => request()->get('nis'),
      'nama_siswa' => request()->get('nama_siswa'),
      'id_kategori' => str_slug(request()->get('id_kategori')),
      'presensi' => request()->get('presensi'),
      'keterangan' => request()->get('keterangan'),
  ]);;
      return redirect()->route('absen.index')
                      ->with('success','absensi created successfully');

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
      $absensi = absensi::find($id);
      // dd($absensi->nis);
      return view('content/absen/absen_edit', compact('absensi'));
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
      $absensi = absensi::find($id);
      $absensi->nis = $request->nis;
      $absensi->nama_siswa = $request->nama_siswa;
      $absensi->presensi = $request->presensi;
      $absensi->keterangan = $request->keterangan;
      $absensi->save();
      // dd($absensi);
      // return view('content/absen/absen', compact('absensi'));
      // return redirect('absen');
      return redirect()->route('absen.index')
                      ->with('edit','absensi update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $absensi = absensi::find($id);
      $absensi->delete();
      // dd($absensi);
      return redirect()->route('absen.index')->with('delete','absensi deleted successfully');
    }
}

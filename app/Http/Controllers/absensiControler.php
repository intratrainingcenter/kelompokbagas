<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\absensi;
use App\siswa;

class absensiControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $attendance = absensi::with('join_to_siswa')->get();
      // print_r($attendance[0]->join_to_siswa->nis);
      // dd($attendance);
      $student = siswa::all();
      return view('content/absen/absen', compact('attendance','student'));
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
      $find = siswa::where('nis', $request->nis)->first();
      // dd($find);
      if ($find != null) {
        $getsiswa = siswa::where('nis', $request->nis)->first();
        // dd($getsiswa);
        absensi::create([
          'id_siswa' => $getsiswa,
          'id_kategori' => str_slug(request()->get('id_kategori')),
          'presensi' => request()->get('presensi'),
          'keterangan' => request()->get('keterangan'),
        ]);
        return redirect()->route('absen.index')
        ->with('success','absensi created successfully');
      }else {
        return redirect()->route('absen.index')
        ->with('not_success','absensi not created successfully');
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
      $attendance = absensi::with('join_to_siswa')->whereIn('id',explode(",",$id))
                          ->get();
      // dd($attendance->nis);
      return view('content/absen/absen_edit', compact('attendance'));
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
      $attendance = absensi::find($id);
      $attendance->nis = $request->nis;
      $attendance->nama_siswa = $request->nama_siswa;
      $attendance->presensi = $request->presensi;
      $attendance->keterangan = $request->keterangan;
      $attendance->save();
      // dd($attendance);
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
      $attendance = absensi::find($id);
      $attendance->delete();
      // dd($attendance);
      return redirect()->route('absen.index')->with('delete','absensi deleted successfully');
    }
}

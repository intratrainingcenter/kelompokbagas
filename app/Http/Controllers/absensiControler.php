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


      // dd($attendance);
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
      //script sulit
      $find = siswa::where('nis', $request->nis)->first();
      // dd($find->nama_siswa);
      if ($find != null) {
        $getsiswa = siswa::where('nis', $request->nis)->first();
        $id_siswa = $getsiswa->id;
        absensi::create([
          'id_siswa' => $id_siswa,
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
      $attendance = absensi::with('join_to_siswa')->where('id', $id)->first();
      // dd($attendance->nis);

      $student = siswa::all();
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
      // dd($request);
      $getsiswa = siswa::where('nis', $request->nis)->first();
      // dd($attendances);
      $id_siswa = $getsiswa->id;
      if ($getsiswa != null) {
        $attendance = absensi::find($id);
        $getsiswa->id_siswa = $id_siswa;
        $attendance->presensi = $request->presensi;
        $attendance->keterangan = $request->keterangan;
        $attendance->save();
        // dd($attendance);
        // return view('content/absen/absen', compact('absensi'));
        // return redirect('absen');
        return redirect()->route('absen.index')
        ->with('edit','absensi update successfully');
      }else {
        return redirect()->route('absen.index')
        ->with('edit','absensi update successfully');
      }
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

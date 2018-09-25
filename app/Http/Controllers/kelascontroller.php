<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelas;

class kelascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = kelas::all();
        return view('content/kelas/kelas',['kelas'=>$kelas]);
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
    // dd($request);

        kelas::create([
            'nama_kelas' => request()->get('nama_kelas'),
            'nama_wali_kelas' => request()->get('nama_wali_kelas'),
            'ketua_kelas' => request()->get('nama_ketua_kelas'),
        ]);
        // $add = new kelas;
        // $add->nama_kelas = $request->nama_kelas;
        // $add->nama_wali_kelas = $request->nama_wali_kelas;
        // $add->ketua_kelas = $request->nama_ketua_kelas;
        // $add->save();

            return redirect()->route('kelas.index')->with('success','name kelas created successfully');
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
        $kelas = kelas::find($id);
      // dd($kelas->nama_kelas);
      return redirect()->route('kelas.index')->with('success','Data kelas Update successfully');
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
        $kelas = kelas::find($id);
      $absensi->nama_kelas = $request->nama_kelas;
      $absensi->nama_wali_kelas = $request->nama_wali_kelas;
      $absensi->ketua_kelas = $request->nama_ketua_kelas;
      $absensi->keterangan = $request->keterangan;
      $absensi->save();
      // dd($absensi);
      // return view('content/kelas/kelas', compact('absensi'));
      // return redirect('absen');
      return redirect()->route('kelas.index')
                      ->with('edit','kelas update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $kelas = kelas::find($id);
      $kelas->delete();
      // dd($kelas);
      return redirect()->route('kelas.index')->with('delete','Kelas deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kelas;
use App\siswa;

class kelascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $clases = kelas::with('join_to_siswa')->get();
      // print_r($kelas[0]->join_to_siswa->nis);
      // dd($attendance);
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

        // kelas::create([
        //     'id_siswa' => request()->get('id_siswa'),
        //     'kode_kelas' => request()->get('kode_kelas'),
        // ]);
        $add = new kelas;
        $add->id_siswa = $request->id_siswa;
        $add->kode_kelas = $request->kode_kelas;
        $add->save();

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
        $kelas = kelas::with('join_to_siswa')->where('id', $id)->first();
      // dd($kelas->kode_kelas);
      return view('content/kelas/kelas_edit', compact('kelas'));

        // $kelas = kelas::find($id);
        // // dd($kelas->_kelas);
        // return view('content/kelas/kelas_edit',['kelas'=>$kelas]);
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
        // dd($kelas);
        $kelas->id_siswa = $request->id_siswa;
        $kelas->kode_kelas = $request->kode_siswa;
        $kelas->save();
        // dd($kelas);
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

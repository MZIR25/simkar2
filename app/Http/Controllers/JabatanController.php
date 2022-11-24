<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Karyawan;
use App\Http\Controllers\Controller;
use App\Models\Devisi;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('Jabatan.v_daftar_jabatan', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Jabatan.v_unggah_jabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nama_Jabatan'=> 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menambah Jabatan  '.$request->name.''
        ]);
        $jabatan=new Jabatan;
        $jabatan->Nama_Jabatan=$request->get('Nama_Jabatan');
        $jabatan->save();

        return redirect('daftar_jabatan')->banner('Data berhasil dibuat');
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
    public function edit($jabatan_id)
    {
        $jabatan = Jabatan::find($jabatan_id);
        return view('Jabatan.v_edit_jabatan', compact('jabatan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jabatan_id)
    {
        $this->validate($request, [
            'Nama_Jabatan'=> 'required',
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Jabatan  '.$request->name.''
        ]);
        $jabatan= Jabatan::find($jabatan_id);
        $jabatan->Nama_Jabatan=$request->get('Nama_Jabatan');
        $jabatan->save();

        return redirect('daftar_jabatan')->banner('Data berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jabatan)
    {
        $jabatan = Jabatan::find($jabatan);
        $jabatan->delete();
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menghapus Jabatan  '.$jabatan->name.''
        ]);
        return redirect('daftar_jabatan')->banner("Data berhasil dihapus");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Karyawan;
use App\Http\Controllers\Controller;
use App\Models\Devisi;
use Illuminate\Support\Facades\Auth;
class DevisiController extends Controller
{
    public function index()
    {
        $devisi = Devisi::all();
        return view('Devisi.v_daftar_devisi', compact('devisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Devisi.v_unggah_devisi');
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
            'Nama_Devisi'=> 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menambah Devisi '.$request->name.''
        ]);
        $devisi=new Devisi;
        $devisi->Nama_Devisi=$request->get('Nama_Devisi');
        $devisi->save();
        return redirect('daftar_devisi')->banner('Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($devisi_id)
    {
        $devisi = Devisi::find($devisi_id);
        return view('Devisi.v_edit_devisi', compact('devisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $devisi_id)
    {
        $this->validate($request, [
            'Nama_Devisi'=> 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Devisi '.$request->name.''
        ]);
        $devisi= Devisi::find($devisi_id);
        $devisi->Nama_Devisi=$request->get('Nama_Devisi');
        $devisi->save();
        return redirect('daftar_devisi')->banner('Data berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($devisi)
    {
        $devisi = Devisi::find($devisi);
        $devisi->delete();
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menghapus Devisi  '.$devisi->name.''
        ]);
        return redirect('daftar_devisi')->banner("Data berhasil dihapus");
    }
}

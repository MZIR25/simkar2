<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\Riwayat;
use App\Http\Requests\StoreCutiRequest;
use App\Http\Requests\UpdateCutiRequest;
use App\Exports\CutiExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = Cuti::all();
        return view('Cuti.v_permohonan_cuti', compact('cuti'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan=Karyawan::get();
        return view('Cuti.v_unggah_cuti', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCutiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'Alasan_Cuti'=> 'required',
            'Tanggal_Mulai'=> 'required',
            'Tanggal_Selesai'=> 'required',
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengajukan Permohonan Cuti  '.$request->name.''
        ]);

        $cuti=new Cuti;

        $cuti->karyawan_id= Auth::user()->Karyawan->karyawan_id;
        $cuti->Alasan_Cuti=$request->get('Alasan_Cuti');
        $cuti->Status=$request->get('Status');
        $cuti->Tanggal_Mulai=$request->get('Tanggal_Mulai');
        $cuti->Tanggal_Selesai=$request->get('Tanggal_Selesai');
        $cuti->save();

        return redirect('permohonan_cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit($cuti_id)
    {
        $karyawan=Karyawan::all();
        $cuti = Cuti::find($cuti_id);
        return view('Cuti.v_edit_cuti', compact('cuti','karyawan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCutiRequest  $request
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cuti_id)
    {
        $this->validate($request, [
            'karyawan_id'=> 'required',
            'Alasan_Cuti'=> 'required',

            'Tanggal_Mulai'=> 'required',
            'Tanggal_Selesai'=> 'required',


        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Permohonan Cuti  '.$request->name.''
        ]);
        $cuti = Cuti::find($cuti_id);

        $cuti->karyawan_id=$request->get('karyawan_id');
        $cuti->Alasan_Cuti=$request->get('Alasan_Cuti');
        $cuti->Status=$request->get('Status');
        $cuti->Tanggal_Mulai=$request->get('Tanggal_Mulai');
        $cuti->Tanggal_Selesai=$request->get('Tanggal_Selesai');


        $cuti->save();

        return redirect('permohonan_cuti');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = Cuti::find($id);
        $cuti->delete();

        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menghapus Permohonan Cuti  '.$cuti->name.''
        ]);
        return redirect('permohonan_cuti');

    }
}

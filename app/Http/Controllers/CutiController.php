<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    public function index()
    {
        DB::enableQueryLog();
        if (Auth::user()->level == "karyawan") {
            $cuti = Cuti::where("karyawan_id", Auth::user()->karyawan_id)->with('Karyawan')->get();
        } else {
            $cuti = Cuti::whereHas("Karyawan", fn ($q) => $q->where("STATUS","Active"))->get();
        }
        dd(DB::getQueryLog());
        return view('Cuti.v_permohonan_cuti', compact('cuti'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::orderBy("Nama_Karyawan")->get();
        return view('Cuti.v_unggah_cuti', compact('karyawan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Alasan_Cuti' => 'required',
            'Tanggal_Mulai' => 'required|date|before:Tanggal_Selesai',
            'Tanggal_Selesai' => 'required|date|after:Tanggal_Mulai'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengajukan Permohonan Cuti  ' . $request->name . ''
        ]);

        $cuti = new Cuti;
        if (Auth::user()->level == "karyawan") {

            $cuti->karyawan_id = Auth::user()->Karyawan->karyawan_id;
        } else {
            $cuti->karyawan_id = $request->get('karyawan_id');
        }
        $cuti->Alasan_Cuti = $request->get('Alasan_Cuti');
        $cuti->Status = $request->get('Status');
        $cuti->Keterangan_Status = $request->get('Keterangan_Status');
        $cuti->Tanggal_Mulai = $request->get('Tanggal_Mulai');
        $cuti->Tanggal_Selesai = $request->get('Tanggal_Selesai');
        $cuti->save();

        return redirect('permohonan_cuti')->banner('Data berhasil dibuat');
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
        $cuti = Cuti::with('Karyawan')->where('cuti_id', $cuti_id)->first();
        $karyawan = Karyawan::where('karyawan_id', $cuti->Karyawan->karyawan_id)->first();
        return view('Cuti.v_edit_cuti', compact('cuti', 'karyawan'));
    }
    public function update(Request $request, $cuti_id)
    {
        // dd($request->all());
        $this->validate($request, [
            'Alasan_Cuti' => 'required',
            'Tanggal_Mulai' => 'nullable',
            'Tanggal_Selesai' => 'nullable',
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Permohonan Cuti  ' . $request->name . ''
        ]);
        $cuti = Cuti::find($cuti_id);

        $cuti->Alasan_Cuti = $request->get('Alasan_Cuti');
        $cuti->Status = $request->get('Status');
        $cuti->Keterangan_Status = $request->get('Keterangan_Status');
        $cuti->Tanggal_Mulai = $request->get('Tanggal_Mulai') ?? $cuti->Tanggal_Mulai;
        $cuti->Tanggal_Selesai = $request->get('Tanggal_Selesai') ?? $cuti->Tanggal_Selesai;
        $cuti->save();

        return redirect('permohonan_cuti')->banner('Data berhasil diubah');
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
            'aktivitas' => 'Menghapus Permohonan Cuti  ' . $cuti->name . ''
        ]);
        return redirect('permohonan_cuti')->banner("Data berhasil dihapus");
    }
}

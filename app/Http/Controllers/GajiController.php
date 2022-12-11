<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Riwayat;
use App\Models\Karyawan;
use App\Exports\GajiExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class GajiController extends Controller
{
    public function index()
    {
        if (Auth::user()->level == "karyawan") {
            $gaji = Gaji::where("karyawan_id", Auth::user()->karyawan_id)->with('Karyawan');
        } else {
            $gaji = Gaji::with('Karyawan');
        }

        $gaji = $gaji->whereHas("Karyawan.Jabatan")->get();

        return view('Gaji.v_daftar_gaji', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::get();
        return view('Gaji.v_unggah_gaji', compact('karyawan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Gaji_Pokok' => 'required',
            'Pajak_Bpjs' => 'required',
            'Jumlah_Gaji' => 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menambah Data Gaji Karyawan  ' . $request->name . ''
        ]);

        // $karyawan = Karyawan::where('karyawan_id', $request->get('karyawan_id'))->first();
        if (Gaji::where('karyawan_id', $request->get('karyawan_id'))->first()) {
            return redirect('daftar_gaji')->banner('Gaji Karyawan Telah Ada');
        }
        // dd($request->all());
        Gaji::create([
            'karyawan_id' => $request->get('karyawan_id'),
            'Gaji_Pokok' => str_replace("_", "", $request->get('Gaji_Pokok')),
            'Pajak_Bpjs' => str_replace("_", "", $request->get('Pajak_Bpjs')),
            'Jumlah_Gaji' => str_replace("_", "", $request->get('Jumlah_Gaji')),
        ]);

        return redirect('daftar_gaji')->banner('Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit($gaji_id)
    {

        $gaji = Gaji::with('Karyawan')->where('gaji_id', $gaji_id)->first();
        $karyawan = Karyawan::where('karyawan_id', $gaji->Karyawan->karyawan_id)->first();
        return view('Gaji.v_edit_gaji', compact('gaji', 'karyawan'));
    }
    public function update(Request $request, $gaji_id)
    {

        $this->validate($request, [

            'Gaji_Pokok' => 'required',
            'Pajak_Bpjs' => 'required',
            'Jumlah_Gaji' => 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Data Gaji Karyawan  ' . $request->name . ''
        ]);
        $gaji = Gaji::find($gaji_id);

        $gaji->Gaji_Pokok = str_replace("_", "", $request->get('Gaji_Pokok'));
        $gaji->Pajak_Bpjs = str_replace("_", "", $request->get('Pajak_Bpjs'));
        $gaji->Jumlah_Gaji = str_replace("_", "", $request->get('Jumlah_Gaji'));
        $gaji->save();

        return redirect('daftar_gaji')->banner("Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($gaji)
    {
        $gaji = Gaji::find($gaji);
        $gaji->delete();
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menghapus Gaji Karyawan  ' . $gaji->Nama_karyawan . ''
        ]);
        return redirect('daftar_gaji')->banner("Data berhasil dihapus");
    }
}

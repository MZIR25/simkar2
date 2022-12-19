<?php

namespace App\Http\Controllers;

use App\Models\Jobdesk;
use App\Models\Riwayat;
use App\Models\Karyawan;
use App\Http\Requests\StoreJobdeskRequest;
use App\Http\Requests\UpdateJobdeskRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobdeskController extends Controller
{
    public function index()
    {
        if (Auth::user()->level == "karyawan") {
            $jobdesk = Jobdesk::where("karyawan_id", Auth::user()->karyawan_id)->with('Karyawan');
        } else {
            $jobdesk = Jobdesk::with('Karyawan');
        }

        $jobdesk = $jobdesk->whereHas("Karyawan.Jabatan")->get();

        return view('Jobdesk.v_daftar_jobdesk', compact('jobdesk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::doesntHave("Karyawan")->orderBy("Nama_Karyawan")->get();
        return view('Jobdesk.v_unggah_jobdesk', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobdeskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'karyawan_id' => 'required',
            'Tugas_Karyawan' => 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengunggah Tugas Karyawan  ' . $request->name . ''
        ]);

        $jobdesk = Jobdesk::updateOrCreate([
            'karyawan_id' => $request->karyawan_id,

        ], [
            'Tugas_Karyawan' => $request->Tugas_Karyawan
        ]);
        return redirect('daftar_jobdesk')->banner("Data berhasil dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function show(Jobdesk $jobdesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function edit($jobdesk_id)
    {

        $jobdesk = Jobdesk::with('Karyawan')->where('jobdesk_id', $jobdesk_id)->first();
        $karyawan = Karyawan::where('karyawan_id', $jobdesk->Karyawan->karyawan_id)->first();
        return view('Jobdesk.v_edit_jobdesk', compact('jobdesk', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobdeskRequest  $request
     * @param  \App\Models\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jobdesk_id)
    {
        $this->validate($request, [
            'Tugas_Karyawan' => 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Tugas Karyawan  ' . $request->name . ''
        ]);
        $jobdesk = Jobdesk::find($jobdesk_id);

        $jobdesk->Tugas_Karyawan = $request->get('Tugas_Karyawan');
        $jobdesk->save();

        return redirect('daftar_jobdesk')->banner("Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobdesk  $jobdesk
     * @return \Illuminate\Http\Response
     */
    public function destroy($jobdesk)
    {
        $jobdesk = Jobdesk::find($jobdesk);
        $jobdesk->delete();
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Menghapus Tugas Karyawan  ' . $jobdesk->name . ''
        ]);
        return redirect('daftar_jobdesk')->banner("Data berhasil dihapus");
    }
}

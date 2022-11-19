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
        $jobdesk = Jobdesk::all();
        return view('Jobdesk.v_daftar_jobdesk', compact('jobdesk'));

    }

    public function create()
    {
        $karyawan=Karyawan::get();
        return view('Jobdesk.v_unggah_jobdesk', compact('karyawan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'karyawan_id'=> 'required',
            'Jam_Mulai'=> 'required',
            'Jam_Selesai'=> 'required',
            'Tugas_Karyawan'=> 'required'
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengunggah Tugas Karyawan  '.$request->name.''
        ]);
        $jobdesk=new Jobdesk;

        $jobdesk->karyawan_id=$request->get('karyawan_id');
        $jobdesk->Jam_Mulai=$request->get('Jam_Mulai');
        $jobdesk->Jam_Selesai=$request->get('Jam_Selesai');
        $jobdesk->Tugas_Karyawan=$request->get('Tugas_Karyawan');
        $jobdesk->save();

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

        $karyawan=Karyawan::all();
        $jobdesk = Jobdesk::find($jobdesk_id);
        return view('Jobdesk.v_edit_jobdesk', compact('jobdesk','karyawan'));
    }
    public function update(Request $request, $jobdesk_id)
    {
        $this->validate($request, [
            'karyawan_id'=> 'required',
            'Jam_Mulai'=> 'required',
            'Jam_Selesai'=> 'required',
            'Tugas_Karyawan'=> 'required',
        ]);
        Riwayat::create([
            'id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'aktivitas' => 'Mengubah Tugas Karyawan  '.$request->name.''
        ]);
        $jobdesk= Jobdesk::find($jobdesk_id);

        $jobdesk->karyawan_id=$request->get('karyawan_id');
        $jobdesk->Jam_Mulai=$request->get('Jam_Mulai');
        $jobdesk->Jam_Selesai=$request->get('Jam_Selesai');
        $jobdesk->Tugas_Karyawan=$request->get('Tugas_Karyawan');
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
            'aktivitas' => 'Menghapus Tugas Karyawan  '.$jobdesk->name.''
        ]);
        return redirect('daftar_jobdesk')->banner("Data berhasil dihapus");

    }
}

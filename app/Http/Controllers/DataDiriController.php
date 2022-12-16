<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Devisi;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;


class DataDiriController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with(['Pendidikan'])->where('karyawan_id', Auth::user()->karyawan_id)->firstOrFail();
        $jabatan = Jabatan::where('jabatan_id', $karyawan->jabatan_id)->first();
        $devisi = Devisi::where('devisi_id', $karyawan->devisi_id)->first();
        return view('Karyawan.DataDiri.v_data_diri_karyawan', compact('karyawan', 'jabatan', 'devisi'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

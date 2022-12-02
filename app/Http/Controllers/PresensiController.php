<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\LaporanPresensi;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function presensi()
    {
        $presensi = Presensi::where("tgl_presensi", date("Y-m-d"))->where("karyawan_id", Auth::user()->karyawan_id)->first();

        $laporan = [];
        if ($presensi) {
            $laporan = LaporanPresensi::where('presensi_id', $presensi->presensi_id)->get();
        }
        $terlambat = "-";
        if ($presensi != null && $presensi->jam_masuk > "08:00:00") {
            $time = explode(":", $presensi->jam_masuk);
            $terlambat = ($time[0]*60 + $time[1])-8*60;

            $terlambat = floor($terlambat/60) . ":" . $terlambat % 60;
        }

        return view("Presensi.v_presensi", compact("laporan", 'presensi', 'terlambat'));
    }

    public function laporan()
    {
        $karyawan = Karyawan::all();
        return view("Presensi.v_laporan_presensi", compact("karyawan"));
    }

    public function store_laporan(Request $request)
    {
        $this->validate($request, [
            'jam_mulai'=> 'required',
            'jam_selesai'=> 'required',
            'uraian_pekerjaan'=> 'required',
            'output_pekerjaan'=> 'required',
            'file'=> 'required',
        ]);

        $id = Auth::user()->karyawan_id;

        $presensi = Presensi::where("tgl_presensi", date("Y-m-d"))->where("karyawan_id", $id)->first();
        if ($presensi == null) {
            $keterangan = "tepat waktu";
            if (Carbon::now()->format("H:i") > "08:00") {
                $keterangan = "terlambat";
            }
            $presensi = Presensi::create([
                "karyawan_id" => $id,
                "jam_masuk" => Carbon::now()->format("H:i"),
                "tgl_presensi" => date("Y-m-d"),
                "keterangan" => $keterangan,
            ]);
        }

        $nameFile = md5(date("Y-m-d-H-i-s") . $id) . "." . $request->file->getClientOriginalExtension();
        $request->file->storeAs(
            'public/laporan_presensi', $nameFile
        );

        LaporanPresensi::create([
            'presensi_id' => $presensi->presensi_id,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'output_pekerjaan' => $request->output_pekerjaan,
            'uraian_pekerjaan' => $request->uraian_pekerjaan,
            'file' => $nameFile,
        ]);

        return redirect('presensi')->banner("Laporan berhasil ditambah");
    }

    public function store_presensi(Request $request)
    {
        $presensi = Presensi::where("tgl_presensi", date("Y-m-d"))->where("karyawan_id", Auth::user()->karyawan_id)->first();

        if ($presensi == null) {
            $keterangan = "tepat waktu";
            if (Carbon::now()->format("H:i") > "08:00") {
                $keterangan = "terlambat";
            }
            $id = Auth::user()->karyawan_id;

            $presensi = Presensi::create([
                "karyawan_id" => $id,
                "tgl_presensi" => date("Y-m-d"),
                "keterangan" => $keterangan,
                "jam_masuk" => Carbon::now()->format("H:i")
            ]);
        }
        if ($request->status == "masuk") {
            $presensi->update([
                "jam_masuk" => Carbon::now()->format("H:i")
            ]);
        }

        if ($request->status == "pulang") {
            $presensi->update([
                "jam_keluar" => Carbon::now()->format("H:i")
            ]);
        }

        return back();
    }

    public function riwayat_presensi()
    {

        $presensi = Presensi::get();
        return view("Presensi.v_riwayat_presensi", compact("presensi"));
    }

    public function detail_presensi(Presensi $presensi)
    {
        $laporan = [];
        if ($presensi) {
            $laporan = LaporanPresensi::where('presensi_id', $presensi->presensi_id)->get();
        }
        $terlambat = "-";
        if ($presensi != null && $presensi->jam_masuk > "08:00:00") {
            $time = explode(":", $presensi->jam_masuk);
            $terlambat = ($time[0]*60 + $time[1])-8*60;

            $terlambat = floor($terlambat/60) . ":" . $terlambat % 60;
        }

        return view("Presensi.v_detail_presensi", compact("laporan", 'presensi', 'terlambat'));
    }

    public function detail_laporan(LaporanPresensi $laporan)
    {
        return view("Presensi.v_detail_laporan", compact("laporan"));
    }

    public function update_laporan(LaporanPresensi $laporan, Request $request)
    {
        $laporan->update([
            "jam_mulai" => $request->jam_mulai,
            "jam_selesai" => $request->jam_selesai,
            "uraian_pekerjaan" => $request->uraian_pekerjaan,
            "output_pekerjaan" => $request->output_pekerjaan,
        ]);

        if ($request->file != Null) {
            $request->file->storeAs(
                'public/laporan_presensi', $laporan->file
            );
        }

        return back();
    }

    public function destroy_laporan(LaporanPresensi $laporan)
    {
        Storage::delete("public/laporan_presensi/" . $laporan->file);

        $laporan->forceDelete();


        return back();
    }
}

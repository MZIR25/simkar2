<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Jabatan;
use App\Models\Devisi;
use Illuminate\Support\Carbon;

class CutiController extends Controller
{
    public function index()
    {
        DB::enableQueryLog();
        if (Auth::user()->level == "karyawan") {
            $cuti = Cuti::where("karyawan_id", Auth::user()->karyawan_id)
                ->with("Karyawan")
                ->get();
        } else {
            $cuti = Cuti::with(["Karyawan"])
                ->whereRelation("Karyawan", "STATUS", "Active")
                ->get();
        }
        $jabatan = Jabatan::where("jabatan_id")->first();
        $devisi = Devisi::where("devisi_id")->first();
        // dd(DB::getQueryLog(),$cuti);
        // dd(DB::getQueryLog());
        return view("Cuti.v_permohonan_cuti", compact("cuti"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::orderBy("Nama_Karyawan")->get();
        return view("Cuti.v_unggah_cuti", compact("karyawan"));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "Alasan_Cuti" => "required",
            "Tanggal_Mulai" => "required|date|before:Tanggal_Selesai",
            "Tanggal_Selesai" => "required|date|after:Tanggal_Mulai",
        ]);
        Riwayat::create([
            "id" => Auth::user()->id,
            "nama" => Auth::user()->name,
            "level" => Auth::user()->level,
            "aktivitas" => "Mengajukan Permohonan Cuti  " . $request->name . "",
        ]);

        $cuti = new Cuti();
        if (Auth::user()->level == "karyawan") {
            $cuti->karyawan_id = Auth::user()->Karyawan->karyawan_id;
        } else {
            $cuti->karyawan_id = $request->get("karyawan_id");
        }
        $cuti->Alasan_Cuti = $request->get("Alasan_Cuti");
        $cuti->Status = $request->get("Status");
        $cuti->Keterangan_Status = $request->get("Keterangan_Status");
        $cuti->Tanggal_Mulai = $request->get("Tanggal_Mulai");
        $cuti->Tanggal_Selesai = $request->get("Tanggal_Selesai");
        $cuti->save();

        return redirect("permohonan_cuti")->banner("Data berhasil dibuat");
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
        $cuti = Cuti::with("Karyawan")
            ->where("cuti_id", $cuti_id)
            ->first();
        $karyawan = Karyawan::where(
            "karyawan_id",
            $cuti->Karyawan->karyawan_id
        )->first();
        return view("Cuti.v_edit_cuti", compact("cuti", "karyawan"));
    }
    public function update(Request $request, $cuti_id)
    {
        // dd($request->all());
        $this->validate($request, [
            "Alasan_Cuti" => "required",
            "Tanggal_Mulai" => "nullable",
            "Tanggal_Selesai" => "nullable",
        ]);
        Riwayat::create([
            "id" => Auth::user()->id,
            "nama" => Auth::user()->name,
            "level" => Auth::user()->level,
            "aktivitas" => "Mengubah Permohonan Cuti  " . $request->name . "",
        ]);
        $cuti = Cuti::find($cuti_id);

        $cuti->Alasan_Cuti = $request->get("Alasan_Cuti");
        $cuti->Status = $request->get("Status");
        $cuti->Keterangan_Status = $request->get("Keterangan_Status");
        $cuti->Tanggal_Mulai =
            $request->get("Tanggal_Mulai") ?? $cuti->Tanggal_Mulai;
        $cuti->Tanggal_Selesai =
            $request->get("Tanggal_Selesai") ?? $cuti->Tanggal_Selesai;
        $cuti->save();

        return redirect("permohonan_cuti")->banner("Data berhasil diubah");
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
            "id" => Auth::user()->id,
            "nama" => Auth::user()->name,
            "level" => Auth::user()->level,
            "aktivitas" => "Menghapus Permohonan Cuti  " . $cuti->name . "",
        ]);
        return redirect("permohonan_cuti")->banner("Data berhasil dihapus");
    }

    public function rekap_cuti(Request $request)
    {
        $data = $request->validate([
            "start_date" => "nullable|date|before:today",
            "end_date" =>
                "nullable|date|after:start_date|before_or_equal:today",
        ]);

        $start = Carbon::createFromFormat(
            "Y-m-d",
            $data["start_date"] ??
                Carbon::now()
                    ->subMonth()
                    ->format("Y-m-d")
        );
        $end = Carbon::createFromFormat(
            "Y-m-d",
            $data["end_date"] ?? Carbon::now()->format("Y-m-d")
        );

        // dd(Cuti::whereBetween('Tanggal_Mulai', [$start->format("Y-m-d"), $end->format("Y-m-d")])->with("Karyawan")->get());
        $karyawan = Karyawan::with([
            "cuti" => fn($query) => $query
                ->whereBetween("Tanggal_Mulai", [
                    $start->format("Y-m-d"),
                    $end->format("Y-m-d"),
                ])
                ->where("Status", "Accept"),
        ])
            ->has("cuti")
            ->get()
            ->filter(fn ($k) => $k->cuti->isNotEmpty());

        return view("Cuti.v_rekap_cuti", compact("karyawan"));
    }
}

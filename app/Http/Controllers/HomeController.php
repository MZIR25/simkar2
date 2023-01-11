<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Riwayat;
use App\Models\Pendidikan;
use App\Models\Devisi;
use App\Models\Gaji;
use App\Models\Presensi;
use App\Models\Jabatan;
use App\Models\Jobdesk;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $karyawan = Karyawan::with(['Pendidikan'])->where('STATUS', 'Active')->get();


        if (Auth::user()->level == "karyawan") {
            $cuti = Cuti::where("karyawan_id", Auth::user()->karyawan_id)->with('Karyawan')->get();
        } else {
            $cuti = Cuti::with(['Karyawan'])->whereRelation("Karyawan", "STATUS","Active")->get();
        }

        // $cuti = Cuti::with(["Karyawan"])
        //         ->whereRelation("Karyawan", "STATUS", "Active")
        //         ->get();
        $gaji = Gaji::with(["Karyawan"])
        ->whereRelation("Karyawan", "STATUS", "Active")
        ->get();

        if (Auth::user()->level == "karyawan") {
            $jobdesk = Jobdesk::where("karyawan_id", Auth::user()->karyawan_id)->with('Karyawan')->get();
        } else {
            $jobdesk = Jobdesk::with(['Karyawan'])->whereRelation("Karyawan", "STATUS","Active")->get();
        }

        // $jobdesk = Jobdesk::with(["Karyawan"])
        // ->whereRelation("Karyawan", "STATUS", "Active")
        // ->get();
        $presensi = Presensi::with(["Karyawan"])
        ->whereRelation("Karyawan", "STATUS", "Active")
        ->get();
        // $presensi = Presensi::with('Karyawan')->get();
        $riwayat = DB::table('riwayat')->latest()->paginate(100);
        return view('layouts.v_home',compact('karyawan','cuti','gaji','jobdesk','riwayat','presensi'));

    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Riwayat;
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
        $riwayat = DB::table('riwayat')->latest()->paginate(100);
        return view('layouts.v_home',compact('riwayat'));
    }
}

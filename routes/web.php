<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JobdeskController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\PresensiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('/logout',[HomeController::class,'logout']);

Route::middleware(['auth','ceklevel:admin'])->group(function () {
    Route::get('/manajemen_user', [ManajemenUserController::class, 'index'])->name('manajemen_user');
    Route::get('/edit_user/{id}', [ManajemenUserController::class, 'edit'])->name('edit_user');
    Route::put('/update_user/{id}', [ManajemenUserController::class, 'update'])->name('update_user');
    Route::delete('/delete_user/{id}', [ManajemenUserController::class, 'destroy'])->name('delete_user');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    //Karyawan
    Route::get('/daftar_karyawan', [KaryawanController::class, 'index'])->name('daftar_karyawan');
    Route::get('/unggah_daftar_karyawan', [KaryawanController::class, 'create'])->name('unggah_daftar_karyawan');
    Route::post('/simpan_karyawan', [KaryawanController::class, 'store'])->name('simpan_karyawan');
    Route::get('/edit_karyawan/{karyawan_id}', [KaryawanController::class, 'edit'])->name('edit_karyawan');
    Route::put('/update_karyawan/{karyawan_id}', [KaryawanController::class, 'update'])->name('update_karyawan');
    Route::delete('/delete_karyawan/{karyawan_id}', [KaryawanController::class, 'destroy'])->name('delete_karyawan');
    // Route::get('/daftar_karyawan/export_excel', [KaryawanController::class, 'export_excel'])->name('daftar_karyawan');
    Route::get('/data_diri_karyawan', [DataDiriController::class, 'index'])->name('data_diri_karyawan');

    //permohonan_cuti
    Route::get('/permohonan_cuti', [CutiController::class, 'index'])->name('permohonan_cuti');
    Route::get('/unggah_cuti', [CutiController::class, 'create'])->name('unggah_cuti');
    Route::post('/simpan_cuti', [CutiController::class, 'store'])->name('simpan_cuti');
    Route::get('/edit_cuti/{cuti_id}', [CutiController::class, 'edit'])->name('edit_cuti');
    Route::put('/update_cuti/{cuti_id}', [CutiController::class, 'update'])->name('update_cuti');
    Route::delete('/delete_cuti/{cuti_id}', [CutiController::class, 'destroy'])->name('delete_cuti');
    // Route::get('/permohonan_cuti/export_excel', [CutiController::class, 'export_excel'])->name('permohonan_cuti');

    //Gaji
    Route::get('/daftar_gaji', [GajiController::class, 'index'])->name('daftar_gaji');
    Route::get('/unggah_gaji', [GajiController::class, 'create'])->name('unggah_gaji');
    Route::post('/simpan_gaji', [GajiController::class, 'store'])->name('simpan_gaji');
    Route::get('/edit_gaji/{gaji_id}', [GajiController::class, 'edit'])->name('edit_gaji');
    Route::put('/update_gaji/{gaji_id}', [GajiController::class, 'update'])->name('update_gaji');
    Route::delete('/delete_gaji/{gaji_id}', [GajiController::class, 'destroy'])->name('delete_gaji');
    // Route::get('/daftar_gaji/export_excel', [GajiController::class, 'export_excel'])->name('daftar_gaji');

    //Jobdesk
    Route::get('/daftar_jobdesk', [JobdeskController::class, 'index'])->name('daftar_jobdesk');
    Route::get('/unggah_jobdesk', [JobdeskController::class, 'create'])->name('unggah_jobdesk');
    Route::post('/simpan_jobdesk', [JobdeskController::class, 'store'])->name('simpan_jobdesk');
    Route::get('/edit_jobdesk/{jobdesk_id}', [JobdeskController::class, 'edit'])->name('edit_jobdesk');
    Route::put('/update_jobdesk/{jobdesk_id}', [JobdeskController::class, 'update'])->name('update_jobdesk');
    Route::delete('/delete_jobdesk/{jobdesk_id}', [JobdeskController::class, 'destroy'])->name('delete_jobdesk');
    // Route::get('/daftar_jobdesk/export_excel', [JobdeskController::class, 'export_excel'])->name('daftar_jobdesk');

    //Jabatan
    Route::get('/daftar_jabatan', [JabatanController::class, 'index'])->name('daftar_jabatan');
    Route::get('/unggah_jabatan', [JabatanController::class, 'create'])->name('unggah_jabatan');
    Route::post('/simpan_jabatan', [JabatanController::class, 'store'])->name('simpan_jabatan');
    Route::get('/edit_jabatan/{jabatan_id}', [JabatanController::class, 'edit'])->name('edit_jabatan');
    Route::put('/update_jabatan/{jabatan_id}', [JabatanController::class, 'update'])->name('update_jabatan');
    Route::delete('/delete_jabatan/{jabatan_id}', [JabatanController::class, 'destroy'])->name('delete_jabatan');

    //Devisi
    Route::get('/daftar_devisi', [DevisiController::class, 'index'])->name('daftar_devisi');
    Route::get('/unggah_devisi', [DevisiController::class, 'create'])->name('unggah_devisi');
    Route::post('/simpan_devisi', [DevisiController::class, 'store'])->name('simpan_devisi');
    Route::get('/edit_devisi/{devisi_id}', [DevisiController::class, 'edit'])->name('edit_devisi');
    Route::put('/update_devisi/{devisi_id}', [DevisiController::class, 'update'])->name('update_devisi');
    Route::delete('/delete_devisi/{devisi_id}', [DevisiController::class, 'destroy'])->name('delete_devisi');



});

Route::middleware(['auth','ceklevel:admin,karyawan'])->group(function () {
    //permohonan_cuti
    Route::get('/permohonan_cuti', [CutiController::class, 'index'])->name('permohonan_cuti');
    Route::get('/unggah_cuti', [CutiController::class, 'create'])->name('unggah_cuti');
    Route::post('/simpan_cuti', [CutiController::class, 'store'])->name('simpan_cuti');
    Route::get('/edit_cuti/{cuti_id}', [CutiController::class, 'edit'])->name('edit_cuti');
    Route::get('/rekap_cuti', [CutiController::class, 'rekap_cuti'])->name('rekap_cuti');

    //karyawan
    Route::get('/daftar_karyawan', [KaryawanController::class, 'index'])->name('daftar_karyawan');
    Route::get('/data_diri_karyawan', [DataDiriController::class, 'index'])->name('data_diri_karyawan');
        //Gaji
    Route::get('/daftar_gaji', [GajiController::class, 'index'])->name('daftar_gaji');
    //Jobdesk
    Route::get('/daftar_jobdesk', [JobdeskController::class, 'index'])->name('daftar_jobdesk');

    //presensi
    Route::get('/laporan_presensi', [PresensiController::class, 'laporan'])->name('laporan_presensi');
    Route::post('/laporan_presensi', [PresensiController::class, 'store_laporan'])->name('create_laporan_presensi');
    Route::get('/presensi', [PresensiController::class, 'presensi'])->name('presensi');
    Route::post('/presensi', [PresensiController::class, 'store_presensi'])->name('create_presensi');
    Route::get('/riwayat_presensi', [PresensiController::class, 'riwayat_presensi'])->name('riwayat_presensi');
    Route::get('/detail_presensi/{presensi}', [PresensiController::class, 'detail_presensi'])->name('detail_presensi');
    Route::delete('/delete_laporan/{laporan}', [PresensiController::class, 'destroy_laporan'])->name('delete_laporan');
    Route::get('/detail_laporan/{laporan}', [PresensiController::class, 'detail_laporan'])->name('detail_laporan');
    Route::put('/update/laporan/{laporan}', [PresensiController::class, 'update_laporan'])->name('update_laporan_presensi');
    Route::get('/rekap_presensi', [PresensiController::class, 'rekap_presensi'])->name('rekap_presensi');
    Route::get('/form_rekap', [PresensiController::class, 'form_rekap'])->name('form_rekap');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/index', [HomeController::class, 'index'])->name('index');


});
Auth::routes();

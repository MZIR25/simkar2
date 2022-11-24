<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = "presensi";
    protected $primaryKey = "presensi_id";
    protected $fillable = [
        'presensi_id', 'karyawan_id', "jam_masuk", "jam_keluar", 'tgl_presensi', 'keterangan'
    ];

    public function LaporanPresensi()
    {
        return $this->hasMany(LaporanPresensi::class, 'presensi_id');
    }

    public function Karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}

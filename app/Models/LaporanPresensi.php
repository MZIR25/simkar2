<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPresensi extends Model
{
    protected $table = "laporan_presensi";
    protected $primaryKey = "laporan_presensi_id";
    protected $fillable = [
        'laporan_presensi_id', 'presensi_id', 'jam_mulai', 'jam_selesai', 'uraian_pekerjaan', 'output_pekerjaan'
    ];

    public function LaporanPresensi()
    {
        return $this->belongsTo(Presensi::class);
    }
}

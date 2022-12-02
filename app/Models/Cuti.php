<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cuti extends Model
{
    // use HasHashedRouteKey;



    protected $table = "permohonan_cuti";
    protected $primaryKey = "cuti_id";
    protected $fillable = [
       'cuti_id',
       'Alasan_Cuti',
       'Status',
       'Tanggal_Mulai',
       'Keterangan_Status',
       'Tanggal_Selesai'];

       public function Karyawan()
       {
           return $this->belongsTo(Karyawan::class,'karyawan_id');
       }
}

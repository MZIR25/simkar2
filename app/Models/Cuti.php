<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = "permohonan_cuti";
    protected $primaryKey = "cuti_id";
    protected $fillable = [
       'cuti_id',
       'Alasan_Cuti',
       'Status',
       'Tanggal_Mulai',
       'Tanggal_Selesai',
       'Alamat',
       'No_HP'];

       public function Karyawan()
       {
           return $this->belongsTo(Karyawan::class,'karyawan_id');
       }
}

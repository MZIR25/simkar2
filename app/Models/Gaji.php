<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = "daftar_gaji";
    protected $primaryKey = "gaji_id";
    protected $fillable = [
       'gaji_id',
       'Gaji_Pokok',
       'Status_Menikah',
       'Pajak_Bpjs',
       'Jumlah_Gaji'];

       public function Karyawan()
       {
           return $this->belongsTo(Karyawan::class,'karyawan_id');
       }
}

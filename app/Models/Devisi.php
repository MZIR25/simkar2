<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisi extends Model
{
    protected $table = "devisi";
    protected $primaryKey = "devisi_id";
    protected $fillable = [
       'jabatan_id',
       'Nama_Devisi'];

       public function Karyawan()
       {
           return $this->hasOne(Karyawan::class,'karyawan_id');
       }
}

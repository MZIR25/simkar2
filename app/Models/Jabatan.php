<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = "jabatan";
    protected $primaryKey = "jabatan_id";
    protected $fillable = [
       'jabatan_id',
       'Jabatan',
       'Keterangan'];

       public function Karyawan()
       {
           return $this->hasOne(Karyawan::class,'karyawan_id');
       }
}

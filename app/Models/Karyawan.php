<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = "karyawan_id";
    protected $fillable = [
       'karyawan_id',
       'jabatan_id',
       'devisi_id',
       'pendidikan_id',
       'Nama_Karyawan',
       'Alamat_Karyawan',
       'Tempat_Lahir',
       'Tanggal_Lahir',
       'Agama',
       'Golongan_Darah',
       'Status_Pernikahan',
       'Jumlah_Anak',
       'No_Hp',
       'Mulai_Kerja',
       'image',
       'STATUS',

    ];



    public function Jobdesk()
    {
        return $this->hasMany(Jobdesk::class);
    }
    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class,'jabatan_id');
    }
    public function Pendidikan()
    {
        return $this->belongsTo(Pendidikan::class,'pendidikan_id');
    }
    public function Devisi()
    {
        return $this->belongsTo(Devisi::class,'devisi_id');
    }

    public function Riwayats()
    {
        return $this->belongsTo(Riwayat::class,'karyawan_id');
    }

    public function User()
    {
        return $this->hasOne(User::class);
    }

    public function Gaji()
    {
        return $this->hasOne(Gaji::class);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'karyawan_id');
    }

    public function imageLink()
    {
        if ($this->image != null)
        {
            return asset('storage/'. $this->image);
        } else {
            return asset("karyawan.png");
        }
    }
}

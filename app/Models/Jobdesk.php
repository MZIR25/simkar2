<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobdesk extends Model
{
    protected $table = "jobdesk";
    protected $primaryKey = "jobdesk_id";
    protected $fillable = [
        'jobdesk_id',
        'Tugas_Karyawan'
    ];


    public function Karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Riwayat extends Model
{
    protected $table = "riwayat";

    protected $fillable = ['id','nama','level', 'aktivitas','created_at'];

    public function Karyawan()
    {
        return DB::table('karyawan')->get();
    }

    public function getCreatedAtAttribute()
    {

        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d, M Y H:i a');
    }
}

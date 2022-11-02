<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenUser extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'name', 'email', 'password', 'level', 'karyawan_id'
    ];
}

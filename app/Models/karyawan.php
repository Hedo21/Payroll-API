<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table      = "karyawan";
    protected $primaryKey = "id_karyawan";
    protected $fillable   = [
        'username',
        'password',
        'level_karyawan',
        'nama',
        'alamat',
        'email',
        'no_telpon',
        'absensi'
    ];
    use HasFactory;
}

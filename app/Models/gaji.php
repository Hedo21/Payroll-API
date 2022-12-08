<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    protected $table = "gaji";
    protected $fillable = [
        'id_karyawan',
        'id_gaji',
        'id_uang_makan',
        'gaji_basic',
        'slip_gaji',
        'pensiun',
        'dana_lain'
    ];
    use HasFactory;

    public function gaji_karyawan()
    {
        return $this->belongsTo(karyawan::class, 'id_karyawan');
    }
}

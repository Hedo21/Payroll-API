<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    protected $table      = "gaji";
    protected $primaryKey = "id_gaji";
    protected $fillable   = [
        'id_gaji',
        'id_karyawan',
        'id_uang_makan',
        'gaji_basic',
        'slip_gaji',
        'pensiun',
        'dana_lain'
    ];
    use HasFactory;

    public function nama_karyawan()
    {
        return $this->belongsTo('App\Models\karyawan', 'id_karyawan', 'id_karyawan');
        // return $this->belongsTo(karyawan::class, 'id_karyawan');
    }
}

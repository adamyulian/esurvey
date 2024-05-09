<?php

namespace App\Models;

use Guava\FilamentDrafts\Concerns\HasDrafts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    use HasDrafts;

    protected $fillable = [
            'kondisi_riil',
            'penanggung_jawab',
            'jabatan',
            'bidang',
            'bbm',
            'pemakaian',
            'angka_speedometer',
            'gambar_speedometer',
            'gambar_mesin',
            'gambar_interior',
            'gambar_eksterior',
            'gambar_nokanosin',
    ];
}

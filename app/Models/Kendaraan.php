<?php

namespace App\Models;

use Guava\FilamentDrafts\Concerns\HasDrafts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
            //Informasi Kendaraan
            'opd',
            'lokasi',
            'penyelia',
            'sesi',
            'register',
            'deskripsi',
            'jenis',
            'nama',
            'merk',
            'tipe',
            'tahun_pengadaan',
            'kondisi',
            'kategori',
            'no_mesin',
            'no_rangka',
            'nopol',
            'nilai_perolehan',

            //survey
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
            'nokasin',
            'keterangan',
            'is_published'
    ];
}

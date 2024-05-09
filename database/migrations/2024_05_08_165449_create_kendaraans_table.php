<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('opd')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('penyelia')->nullable();
            $table->string('sesi')->nullable();
            $table->string('register')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('jenis')->nullable();
            $table->string('nama')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('tahun_pengadaan')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('kategori')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('nopol')->nullable();
            $table->string('nilai_perolehan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};

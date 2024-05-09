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
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->string('kondisi_riil')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('bidang')->nullable();
            $table->string('bbm')->nullable();
            $table->string('pemakaian')->nullable();
            $table->string('angka_speedometer')->nullable();
            $table->string('gambar_speedometer')->nullable();
            $table->string('gambar_mesin')->nullable();
            $table->string('gambar_interior')->nullable();
            $table->string('gambar_eksterior')->nullable();
            $table->string('gambar_nokanosin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            //
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('id_dokumentasi')->nullable();
            $table->string('pengaduan')->nullable();
            $table->string('lokasi_pengaduan')->nullable();
            $table->date('tanggal_pengaduan')->nullable();
            $table->string('keterangan_pengaduan')->nullable();
            $table->string('posisi_pengaduan')->nullable();
            $table->string('status_pengaduan')->nullable();
            $table->string('hasil_pengaduan')->nullable();
            $table->string('catatan_pengaduan')->nullable();
            $table->boolean('validasi_pengaduan')->default(false);
            $table->boolean('konfirmasi_pengaduan')->default(false);
            $table->string('nama_pengadu')->nullable();
            $table->string('kontak_pengadu')->nullable();
            $table->string('identitas_pengadu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};

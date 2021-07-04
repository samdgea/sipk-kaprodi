<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('seleksi_mahasiswa_lokal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('academic_year_id');
            $table->integer('daya_tampung_mhs');
            $table->integer('jumlah_calon_pendaftar');
            $table->integer('jumlah_lulus_seleksi');
            $table->integer('jumlah_mahasiswa_reguler_baru');
            $table->integer('jumlah_mahasiswa_transfer_baru');
            $table->integer('jumlah_mahasiswa_reguler_aktif');
            $table->integer('jumlah_mahasiswa_transfer_aktif');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->bigInteger('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seleksi_mahasiswa_lokal');
    }
};

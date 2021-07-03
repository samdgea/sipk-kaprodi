<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMahasiswaTableAddColumnRegYear extends Migration
{
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->year('tahun_daftar')->after('nim_mahasiswa')->nullable();
        });
    }

    public function down()
    {
    }
}

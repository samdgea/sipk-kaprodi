<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('seleksi_mahasiswa_asing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('academic_year_id');
            $table->integer('jumlah_mahasiswa_aktif');
            $table->integer('jumlah_mahasiswa_asing_full_time');
            $table->integer('jumlah_mahasiswa_asing_part_time');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->bigInteger('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seleksi_mahasiswa_asing');
    }
};

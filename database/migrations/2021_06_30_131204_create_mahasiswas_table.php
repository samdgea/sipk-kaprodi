<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('faculty_id');
            $table->bigInteger('study_program_id');
            $table->string('nim_mahasiswa')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->year('tahun_daftar')->nullable();
            $table->enum('gender', ["M", "F"])->default('M');
            $table->string('program_studi',5)->default('TIF');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->bigInteger('updated_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}

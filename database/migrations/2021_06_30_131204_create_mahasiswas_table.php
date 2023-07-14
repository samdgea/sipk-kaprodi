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
            $table->year('expected_graduate_year')->nullable();
            $table->enum('gender', ["M", "F"])->default('M');
            $table->string('program_studi',5)->default('TIF');
            $table->enum('type_mahasiswa', ['REGULAR', 'ASING', 'TRANSFER'])->default('REGULAR');
            $table->boolean('status_mahasiswa')->default(true);
            $table->boolean('status_cuti')->default(false);
            $table->boolean('is_graduated')->default(false);
            $table->boolean('is_work_related_with_study_program')->default(false)->nullable();
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

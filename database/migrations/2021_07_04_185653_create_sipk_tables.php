<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tbl_fakultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_fakultas', 2);
            $table->string('nama_fakultas');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->bigInteger('deleted_by')->nullable();
        });

        Schema::create('tbl_program_studi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('faculty_id');
            $table->string('kode_program_studi');
            $table->string('nama_program_studi');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->bigInteger('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_fakultas');
        Schema::dropIfExists('tbl_program_studi');
    }
};

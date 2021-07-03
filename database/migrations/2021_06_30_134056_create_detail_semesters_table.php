<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSemestersTable extends Migration
{
    public function up()
    {
        Schema::create('detail_semester', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mahasiswa_id');
            $table->integer('semester');
            $table->double('ips');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_semester');
    }
}

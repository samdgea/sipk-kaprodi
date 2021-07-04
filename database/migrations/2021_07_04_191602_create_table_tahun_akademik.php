<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tahun_akademik', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('tahun_akademik');
            $table->enum('semester_akademik', [1, 2]);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tahun_akademik');
    }
};

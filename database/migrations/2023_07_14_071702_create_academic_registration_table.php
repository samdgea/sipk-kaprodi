<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_registration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tahun_akademik_id');
            $table->bigInteger('mahasiswa_id');
            $table->boolean('registration_result')->default(true);
            $table->boolean('reregistration_result')->default(true);
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
        Schema::dropIfExists('academic_registration');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_dosen');
            $table->enum('education_type', ['S2', 'S3'])->default('S2');
            $table->string('university_name')->default('Universitas Persada Indonesia Y.A.I');
            $table->string('enrollment_major')->nullable();
            $table->date('graduation_date')->default('2000-01-03');
            $table->float('ipk_score')->default(3.5);
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
        Schema::dropIfExists('dosen_education');
    }
}

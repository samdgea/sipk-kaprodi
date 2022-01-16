<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_dosen');
            $table->text('address');
            $table->string('email_address');
            $table->string('phone_number', 20)->nullable();
            $table->string('home_number', 20)->nullable();
            $table->longText('others');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_details');
    }
}

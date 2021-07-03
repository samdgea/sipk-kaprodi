<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('nidn', 10);
            $table->date('date_joined');
            $table->boolean('is_active');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->bigInteger('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen');
    }
}

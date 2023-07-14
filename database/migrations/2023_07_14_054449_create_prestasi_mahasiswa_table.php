<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi_mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mahasiswa_id');
            $table->enum('tipe_prestasi', ['AKADEMIK', 'NON-AKADEMIK']);
            $table->string('nama_prestasi');
            $table->date('tanggal_perolehan_prestasi');
            $table->string('file_dokumen_prestasi')->nullable();
            $table->bigInteger('created_by');
            $table->timestamps();
            $table->bigInteger('updated_by');
            $table->timestamp('deleted_at');
            $table->bigInteger('deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestasi_mahasiswa');
    }
}

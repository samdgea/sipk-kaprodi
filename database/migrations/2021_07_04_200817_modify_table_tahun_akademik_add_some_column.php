<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('tahun_akademik', function (Blueprint $table) {
            if (!Schema::hasColumn('tahun_akademik', 'created_by')) $table->bigInteger('created_by')->after('semester_akademik')->nullable();
            if (!Schema::hasColumn('tahun_akademik', 'updated_by')) $table->bigInteger('updated_by')->after('updated_at')->nullable();
            if (!Schema::hasColumn('tahun_akademik', 'deleted_at')) $table->softDeletes();
            if (!Schema::hasColumn('tahun_akademik', 'deleted_by')) $table->bigInteger('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tahun_akademik', function (Blueprint $table) {
            if (Schema::hasColumn('tahun_akademik', 'created_by')) $table->dropColumn('created_by');
            if (Schema::hasColumn('tahun_akademik', 'updated_by')) $table->dropColumn('updated_by');
            if (Schema::hasColumn('tahun_akademik', 'deleted_at')) $table->dropSoftDeletes();
            if (Schema::hasColumn('tahun_akademik', 'deleted_by')) $table->dropColumn('deleted_by');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('detail_semester', function (Blueprint $table) {
            if (!Schema::hasColumn('detail_semester', 'created_by'))
                $table->bigInteger('created_by')->nullable()->after('ips');

            if (!Schema::hasColumn('detail_semester', 'updated_by'))
                $table->bigInteger('updated_by')->nullable()->after('updated_at');
        });
    }
};

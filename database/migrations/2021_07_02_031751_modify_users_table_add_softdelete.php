<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTableAddSoftdelete extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'created_by')) $table->bigInteger('created_by')->nullable()->after('profile_photo_path');
            if (!Schema::hasColumn('users', 'updated_by')) $table->bigInteger('updated_by')->nullable()->after('created_at');
            if (!Schema::hasColumn('users', 'deleted_at')) $table->softDeletes();
            if (!Schema::hasColumn('users', 'deleted_by')) $table->bigInteger('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'created_by')) $table->dropColumn('created_by');
            if (Schema::hasColumn('users', 'updated_by')) $table->dropColumn('updated_by');
            if (Schema::hasColumn('users', 'deleted_at')) $table->dropColumn('deleted_at');
            if (Schema::hasColumn('users', 'deleted_by')) $table->dropColumn('deleted_by');
        });
    }
}

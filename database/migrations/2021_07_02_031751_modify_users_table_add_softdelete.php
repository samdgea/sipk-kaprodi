<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTableAddSoftdelete extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('created_by')->nullable()->after('profile_photo_path');
            $table->bigInteger('updated_by')->nullable()->after('created_at');
            $table->softDeletes();
            $table->bigInteger('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserShotgunSidearmsTable extends Migration
{
    public function up()
    {
        Schema::table('user_shotgun_sidearms', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('shotgun_sidearm_id')->constrained('shotgun_sidearms')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_shotgun_sidearms', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('shotgun_sidearm_id');
        });
    }
}

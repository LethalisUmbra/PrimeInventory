<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserShotgunsTable extends Migration
{
    public function up()
    {
        Schema::table('user_shotguns', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('shotgun_id')->constrained('shotguns')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_shotguns', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('shotgun_id');
        });
    }
}

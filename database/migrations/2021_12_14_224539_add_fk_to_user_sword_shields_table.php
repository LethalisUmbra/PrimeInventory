<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserSwordShieldsTable extends Migration
{
    public function up()
    {
        Schema::table('user_sword_shields', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('sword_shield_id')->constrained('sword_shields')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_sword_shields', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('sword_shield_id');
        });
    }
}

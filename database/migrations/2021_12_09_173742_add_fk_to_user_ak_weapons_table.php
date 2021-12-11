<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserAkWeaponsTable extends Migration
{
    public function up()
    {
        Schema::table('user_ak_weapons', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('ak_weapon_id')->constrained('ak_weapons')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_ak_weapons', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('ak_weapon_id');
        });
    }
}

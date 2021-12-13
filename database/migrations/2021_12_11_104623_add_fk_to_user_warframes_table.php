<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserWarframesTable extends Migration
{
    public function up()
    {
        Schema::table('user_warframes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('warframe_id')->constrained('warframes')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_warframes', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('warframe_id');
        });
    }
}

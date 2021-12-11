<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserSecCrossbowsTable extends Migration
{
    public function up()
    {
        Schema::table('user_sec_crossbows', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('sec_crossbow_id')->constrained('sec_crossbows')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_sec_crossbows', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('sec_crossbow_id');
        });
    }
}

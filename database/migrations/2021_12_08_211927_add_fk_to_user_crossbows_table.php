<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserCrossbowsTable extends Migration
{
    public function up()
    {
        Schema::table('user_crossbows', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('crossbow_id')->constrained('crossbows')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_crossbows', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('crossbow_id');
        });
    }
}

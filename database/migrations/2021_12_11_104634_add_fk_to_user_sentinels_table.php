<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserSentinelsTable extends Migration
{
    public function up()
    {
        Schema::table('user_sentinels', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('sentinel_id')->constrained('sentinels')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_sentinels', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('sentinel_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserNunchakusTable extends Migration
{
    public function up()
    {
        Schema::table('user_nunchakus', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('nunchaku_id')->constrained('nunchakus')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_nunchakus', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('nunchaku_id');
        });
    }
}

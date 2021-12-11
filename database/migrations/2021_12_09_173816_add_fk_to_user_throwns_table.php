<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserThrownsTable extends Migration
{
    public function up()
    {
        Schema::table('user_throwns', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('thrown_id')->constrained('throwns')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_throwns', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('thrown_id');
        });
    }
}

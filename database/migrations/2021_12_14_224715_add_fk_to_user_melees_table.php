<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserMeleesTable extends Migration
{
    public function up()
    {
        Schema::table('user_melees', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('melee_id')->constrained('melees')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_melees', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('melee_id');
        });
    }
}

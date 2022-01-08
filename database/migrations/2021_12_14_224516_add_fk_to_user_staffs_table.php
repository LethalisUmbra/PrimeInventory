<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserStaffsTable extends Migration
{
    public function up()
    {
        Schema::table('user_staffs', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('staff_id')->constrained('staffs')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_staffs', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('staff_id');
        });
    }
}

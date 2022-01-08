<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserHammersTable extends Migration
{
    public function up()
    {
        Schema::table('user_hammers', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('hammer_id')->constrained('hammers')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_hammers', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('hammer_id');
        });
    }
}

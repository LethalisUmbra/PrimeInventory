<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserFistsTable extends Migration
{
    public function up()
    {
        Schema::table('user_fists', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('fist_id')->constrained('fists')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_fists', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('fist_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserBowsTable extends Migration
{
    public function up()
    {
        Schema::table('user_bows', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('bow_id')->constrained('bows')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_bows', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('bow_id');
        });
    }
}

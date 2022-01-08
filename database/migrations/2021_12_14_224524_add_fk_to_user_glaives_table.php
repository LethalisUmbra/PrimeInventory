<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserGlaivesTable extends Migration
{
    public function up()
    {
        Schema::table('user_glaives', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('glaive_id')->constrained('glaives')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_glaives', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('glaive_id');
        });
    }
}

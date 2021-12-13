<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserArchwingsTable extends Migration
{
    public function up()
    {
        Schema::table('user_archwings', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('archwing_id')->constrained('archwings')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_archwings', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('archwing_id');
        });
    }
}

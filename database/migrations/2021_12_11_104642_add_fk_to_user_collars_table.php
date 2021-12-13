<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserCollarsTable extends Migration
{
    public function up()
    {
        Schema::table('user_collars', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('collar_id')->constrained('collars')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_collars', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('collar_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserSparringsTable extends Migration
{
    public function up()
    {
        Schema::table('user_sparrings', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('sparring_id')->constrained('sparrings')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_sparrings', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('sparring_id');
        });
    }
}

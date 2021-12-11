<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToUserDualPistolsTable extends Migration
{
    public function up()
    {
        Schema::table('user_dual_pistols', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('dual_pistol_id')->constrained('dual_pistols')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('user_dual_pistols', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('dual_pistol_id');
        });
    }
}

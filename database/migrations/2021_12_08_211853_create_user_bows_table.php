<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserBowsTable extends Migration
{
    public function up()
    {
        Schema::create('user_bows', function (Blueprint $table) {
            $table->id();
            $table->integer('blueprint')->default(0);
            $table->integer('upper_limb')->default(0);
            $table->integer('lower_limb')->default(0);
            $table->integer('grip')->default(0);
            $table->integer('string')->default(0);
            $table->boolean('owned')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_bows');
    }
}

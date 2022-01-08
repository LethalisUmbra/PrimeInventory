<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserNikanasTable extends Migration
{
    public function up()
    {
        Schema::create('user_nikanas', function (Blueprint $table) {
            $table->id();
            $table->integer('blueprint')->default(0);
            $table->integer('blade')->default(0);
            $table->integer('hilt')->default(0);
            $table->boolean('owned')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_nikanas');
    }
}

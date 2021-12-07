<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserriflesTable extends Migration
{
    public function up()
    {
        Schema::create('userrifles', function (Blueprint $table) {
            $table->id();
            $table->string('blueprint');
            $table->string('barrel');
            $table->string('receiver');
            $table->string('stock');
        });
    }

    public function down()
    {
        Schema::dropIfExists('userrifles');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiflesTable extends Migration
{
    public function up()
    {
        Schema::create('rifles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('blueprint');
            $table->string('barrel');
            $table->string('receiver');
            $table->string('stock');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rifles');
    }
}

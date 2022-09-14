<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserArchgunsTable extends Migration
{
    public function up()
    {
        Schema::create('user_archguns', function (Blueprint $table) {
            $table->id();
            $table->integer('blueprint')->default(0);
            $table->integer('barrel')->default(0);
            $table->integer('receiver')->default(0);
            $table->integer('stock')->default(0);
            $table->boolean('owned')->default(false);
            $table->foreignId('archguns_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_archguns');
    }
}

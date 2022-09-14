<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArchgunsTable extends Migration
{
    public function up()
    {
        Schema::create('archguns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('barrel')->default(1);
            $table->integer('receiver')->default(1);
            $table->integer('stock')->default(1);
            $table->timestamps();
        });

        DB::table('archguns')->insert([
            [   
                'name' => 'Corvas',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('archguns');
    }
}

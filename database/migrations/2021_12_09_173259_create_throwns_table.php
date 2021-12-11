<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateThrownsTable extends Migration
{
    public function up()
    {
        Schema::create('throwns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('pouch')->default(2);
            $table->integer('blade')->default(2);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('throwns')->insert([
            [   
                'name' => 'Hikou',
            ],
            [   
                'name' => 'Spira',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('throwns');
    }
}

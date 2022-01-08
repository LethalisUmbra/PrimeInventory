<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHammersTable extends Migration
{
    public function up()
    {
        Schema::create('hammers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('head')->default(1);
            $table->integer('handle')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('hammers')->insert([
            [   
                'name' => 'Fragor',
            ],
            [   
                'name' => 'Volnus',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('hammers');
    }
}

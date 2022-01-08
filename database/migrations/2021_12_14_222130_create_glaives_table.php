<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGlaivesTable extends Migration
{
    public function up()
    {
        Schema::create('glaives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('blade')->default(2);
            $table->integer('disc')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('glaives')->insert([
            [   
                'name' => 'Glaive',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('glaives');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNunchakusTable extends Migration
{
    public function up()
    {
        Schema::create('nunchakus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('handle')->default(2);
            $table->integer('chain')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('nunchakus')->insert([
            [   
                'name' => 'Ninkondi',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('nunchakus');
    }
}

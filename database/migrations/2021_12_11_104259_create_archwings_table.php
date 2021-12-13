<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArchwingsTable extends Migration
{
    public function up()
    {
        Schema::create('archwings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('harness')->default(1);
            $table->integer('wings')->default(1);
            $table->integer('systems')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('archwings')->insert([
            [   
                'name' => 'Odonata',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('archwings');
    }
}

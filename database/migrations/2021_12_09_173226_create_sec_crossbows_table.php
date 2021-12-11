<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSecCrossbowsTable extends Migration
{
    public function up()
    {
        Schema::create('sec_crossbows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('upper_limb')->default(1);
            $table->integer('lower_limb')->default(1);
            $table->integer('string')->default(1);
            $table->integer('receiver')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('sec_crossbows')->insert([
            [   
                'name' => 'Ballistica',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sec_crossbows');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateShotgunSidearmsTable extends Migration
{
    public function up()
    {
        Schema::create('shotgun_sidearms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('barrel')->default(1);
            $table->integer('receiver')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('shotgun_sidearms')->insert([
            [   
                'name' => 'Bronco',
            ],
            [   
                'name' => 'Euphona',
            ],
            [
                'name' => 'Pyrana',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('shotgun_sidearms');
    }
}

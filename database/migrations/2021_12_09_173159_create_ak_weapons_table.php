<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAkWeaponsTable extends Migration
{
    public function up()
    {
        Schema::create('ak_weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('single_weapon')->default(2);
            $table->integer('link')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('ak_weapons')->insert([
            [   
                'name' => 'Akbronco',
            ],
            [   
                'name' => 'Aklex',
            ],
            [
                'name' => 'Akvasto',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('ak_weapons');
    }
}

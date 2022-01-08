<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSwordShieldsTable extends Migration
{
    public function up()
    {
        Schema::create('sword_shields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('blade')->default(1);
            $table->integer('guard')->default(1);
            $table->integer('hilt')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('sword_shields')->insert([
            [   
                'name' => 'Silva & Aegis',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sword_shields');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCollarsTable extends Migration
{
    public function up()
    {
        Schema::create('collars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pet_name')->default('Kubrow');
            $table->integer('blueprint')->default(1);
            $table->integer('band')->default(1);
            $table->integer('buckle')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('collars')->insert([
            [   
                'name' => 'Kavasa',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('collars');
    }
}

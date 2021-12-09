<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBowsTable extends Migration
{
    public function up()
    {
        Schema::create('bows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('upper_limb')->default(1);
            $table->integer('lower_limb')->default(1);
            $table->integer('grip')->default(1);
            $table->integer('string')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('bows')->insert([
            [   
                'name' => 'Cernos',
            ],
            [   
                'name' => 'Paris',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('bows');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFistsTable extends Migration
{
    public function up()
    {
        Schema::create('fists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('blade')->default(2);
            $table->integer('gauntlet')->default(2);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('fists')->insert([
            [   
                'name' => 'Ankyros',
            ],
            [   
                'name' => 'Tekko',
            ],
            [   
                'name' => 'Venka',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('fists');
    }
}

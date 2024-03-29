<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateShotgunsTable extends Migration
{
    public function up()
    {
        Schema::create('shotguns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('barrel')->default(1);
            $table->integer('receiver')->default(1);
            $table->integer('stock')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('shotguns')->insert([
            [   
                'name' => 'Astilla',
            ],
            [   
                'name' => 'Boar',
            ],
            [   
                'name' => 'Corinth',
            ],
            [
                'name' => 'Phantasma',
            ],
            [   
                'name' => 'Strun',
            ],
            [   
                'name' => 'Tigris',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('shotguns');
    }
}

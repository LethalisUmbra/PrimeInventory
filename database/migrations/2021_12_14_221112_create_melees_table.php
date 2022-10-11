<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMeleesTable extends Migration
{
    public function up()
    {
        Schema::create('melees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('blade');
            $table->integer('handle');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('melees')->insert([
            [   
                'name' => 'Dakra',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Destreza',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Dual Kamas',
                'blade' => 2,
                'handle' => 2,
            ],
            [   
                'name' => 'Fang',
                'blade' => 2,
                'handle' => 2,
            ],
            [   
                'name' => 'Galatine',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Gram',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Guandao',
                'blade' => 2,
                'handle' => 1,
            ],
            [   
                'name' => 'Karyst',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Kronen',
                'blade' => 2,
                'handle' => 2,
            ],
            [   
                'name' => 'Nami Skyla',
                'blade' => 2,
                'handle' => 2,
            ],
            [   
                'name' => 'Orthos',
                'blade' => 2,
                'handle' => 1,
            ],
            [   
                'name' => 'Pangolin',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Reaper',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Redeemer',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Scindo',
                'blade' => 1,
                'handle' => 1,
            ],
            [   
                'name' => 'Tatsu',
                'blade' => 1,
                'handle' => 1,
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('melees');
    }
}

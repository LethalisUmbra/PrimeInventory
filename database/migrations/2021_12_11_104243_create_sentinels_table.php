<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSentinelsTable extends Migration
{
    public function up()
    {
        Schema::create('sentinels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('cerebrum')->default(1);
            $table->integer('carapace')->default(1);
            $table->integer('systems')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('sentinels')->insert([
            [   
                'name' => 'Carrier',
            ],
            [   
                'name' => 'Dethcube',
            ],
            [   
                'name' => 'Helios',
            ],
            [   
                'name' => 'Wyrm',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sentinels');
    }
}

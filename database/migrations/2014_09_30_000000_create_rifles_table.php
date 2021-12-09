<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRiflesTable extends Migration
{
    public function up()
    {
        Schema::create('rifles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('barrel')->default(1);
            $table->integer('receiver')->default(1);
            $table->integer('stock')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        // All Rifles
        DB::table('rifles')->insert([
            [   
                'name' => 'Baza',
            ],
            [   
                'name' => 'Boltor',
            ],
            [   
                'name' => 'Braton',
            ],
            [   
                'name' => 'Burston',
            ],
            [   
                'name' => 'Latron',
            ],
            [   
                'name' => 'Panthera',
            ],
            [   
                'name' => 'Rubico',
            ],
            [   
                'name' => 'Soma',
            ],
            [   
                'name' => 'Stradavar',
            ],
            [   
                'name' => 'Sybaris',
            ],
            [   
                'name' => 'Tenora',
            ],
            [   
                'name' => 'Tiberon',
            ],
            [   
                'name' => 'Vectis',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('rifles');
    }
}

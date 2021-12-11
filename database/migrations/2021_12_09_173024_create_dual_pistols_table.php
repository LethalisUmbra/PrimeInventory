<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDualPistolsTable extends Migration
{
    public function up()
    {
        Schema::create('dual_pistols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('barrel')->default(2);
            $table->integer('receiver')->default(2);
            $table->integer('link')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('dual_pistols')->insert([
            [   
                'name' => 'Akbolto',
            ],
            [   
                'name' => 'Akjagara',
            ],
            [
                'name' => 'Aksomati',
            ],
            [
                'name' => 'Akstiletto',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('dual_pistols');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePistolsTable extends Migration
{
    public function up()
    {
        Schema::create('pistols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('barrel')->default(1);
            $table->integer('receiver')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('pistols')->insert([
            [
                'name' => 'Knell',
            ],
            [   
                'name' => 'Lex',
            ],
            [   
                'name' => 'Magnus',
            ],
            [
                'name' => 'Pandero',
            ],
            [
                'name' => 'Sicarus',
            ],
            [
                'name' => 'Vasto',
            ],
            [
                'name' => 'Zakti',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('pistols');
    }
}

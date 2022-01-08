<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSparringsTable extends Migration
{
    public function up()
    {
        Schema::create('sparrings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('gauntlet')->default(2);
            $table->integer('boot')->default(2);
            $table->integer('systems')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('sparrings')->insert([
            [   
                'name' => 'Kogake',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sparrings');
    }
}

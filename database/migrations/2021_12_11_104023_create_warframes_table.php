<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateWarframesTable extends Migration
{
    public function up()
    {
        Schema::create('warframes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('blueprint')->default(1);
            $table->integer('neuroptics')->default(1);
            $table->integer('chassis')->default(1);
            $table->integer('systems')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('warframes')->insert([
            [   
                'name' => 'Ash',
            ],
            [   
                'name' => 'Atlas',
            ],
            [
                'name' => 'Banshee',
            ],
            [
                'name' => 'Chroma',
            ],
            [
                'name' => 'Ember',
            ],
            [
                'name' => 'Equinox',
            ],
            [
                'name' => 'Frost',
            ],
            [
                'name' => 'Gara',
            ],
            [
                'name' => 'Harrow',
            ],
            [
                'name' => 'Hydroid',
            ],
            [
                'name' => 'Inaros',
            ],
            [
                'name' => 'Ivara',
            ],
            [
                'name' => 'Limbo',
            ],
            [
                'name' => 'Loki',
            ],
            [
                'name' => 'Mag',
            ],
            [
                'name' => 'Mesa',
            ],
            [
                'name' => 'Mirage',
            ],
            [
                'name' => 'Nekros',
            ],
            [
                'name' => 'Nezha',
            ],
            [
                'name' => 'Nidus',
            ],
            [
                'name' => 'Nova',
            ],
            [
                'name' => 'Nyx',
            ],
            [
                'name' => 'Oberon',
            ],
            [
                'name' => 'Octavia',
            ],
            [
                'name' => 'Rhino',
            ],
            [
                'name' => 'Saryn',
            ],
            [
                'name' => 'Titania',
            ],
            [
                'name' => 'Trinity',
            ],
            [
                'name' => 'Valkyr',
            ],
            [
                'name' => 'Vauban',
            ],
            [
                'name' => 'Volt',
            ],
            [
                'name' => 'Wukong',
            ],
            [
                'name' => 'Zephyr',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('warframes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserRiflesTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_User_Rifles AFTER INSERT ON users FOR EACH ROW
        BEGIN
            DECLARE v_counter INT DEFAULT 1;
            DECLARE r_counter INT;
            SELECT count(*) INTO r_counter FROM rifles;
            
            WHILE v_counter <= r_counter DO
                INSERT INTO user_rifles (user_id, rifle_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Rifles`');
    }
}

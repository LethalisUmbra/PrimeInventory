<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

// CreateUser[Category]sTrigger
class CreateUserCrossbowsTrigger extends Migration
{
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_User_Crossbows AFTER INSERT ON users FOR EACH ROW
        BEGIN
            DECLARE v_counter INT DEFAULT 1;
            DECLARE w_counter INT;
            SELECT count(*) INTO w_counter FROM crossbows;
            
            WHILE v_counter <= w_counter DO
                INSERT INTO user_crossbows (user_id, crossbow_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
        END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Crossbows`');
    }
}

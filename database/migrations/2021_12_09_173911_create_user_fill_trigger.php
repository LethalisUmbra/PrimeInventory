<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

// CreateUser[Category]sTrigger
class CreateUserFillTrigger extends Migration
{
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_fill_user AFTER INSERT ON users FOR EACH ROW
        BEGIN
            DECLARE v_counter INT DEFAULT 1;
            DECLARE weapon_counter INT;

            SELECT count(*) INTO weapon_counter FROM rifles;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_rifles (user_id, rifle_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;

            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM shotguns;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_shotguns (user_id, shotgun_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;

            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM bows;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_bows (user_id, bow_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;

            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM crossbows;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_crossbows (user_id, crossbow_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
            
            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM dual_pistols;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_dual_pistols (user_id, dual_pistol_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
            
            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM ak_weapons;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_ak_weapons (user_id, ak_weapon_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
            
            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM sec_crossbows;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_sec_crossbows (user_id, sec_crossbow_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
            
            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM shotgun_sidearms;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_shotgun_sidearms (user_id, shotgun_sidearm_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
            
            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM throwns;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_throwns (user_id, thrown_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
            
            SET v_counter = 1;

            SELECT count(*) INTO weapon_counter FROM pistols;
            WHILE v_counter <= weapon_counter DO
                INSERT INTO user_pistols (user_id, pistol_id) VALUES (NEW.id, v_counter);
                SET v_counter = v_counter + 1;
            END WHILE;
            
        END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_fill_user`');
    }
}

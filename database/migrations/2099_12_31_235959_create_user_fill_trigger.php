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
            DECLARE v_index INT DEFAULT 1;
            DECLARE v_counter INT;

            SELECT count(*) INTO v_counter FROM rifles;
            WHILE v_index <= v_counter DO
                INSERT INTO user_rifles (user_id, rifle_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM shotguns;
            WHILE v_index <= v_counter DO
                INSERT INTO user_shotguns (user_id, shotgun_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM bows;
            WHILE v_index <= v_counter DO
                INSERT INTO user_bows (user_id, bow_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM crossbows;
            WHILE v_index <= v_counter DO
                INSERT INTO user_crossbows (user_id, crossbow_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
            
            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM dual_pistols;
            WHILE v_index <= v_counter DO
                INSERT INTO user_dual_pistols (user_id, dual_pistol_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
            
            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM ak_weapons;
            WHILE v_index <= v_counter DO
                INSERT INTO user_ak_weapons (user_id, ak_weapon_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
            
            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM sec_crossbows;
            WHILE v_index <= v_counter DO
                INSERT INTO user_sec_crossbows (user_id, sec_crossbow_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
            
            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM shotgun_sidearms;
            WHILE v_index <= v_counter DO
                INSERT INTO user_shotgun_sidearms (user_id, shotgun_sidearm_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
            
            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM throwns;
            WHILE v_index <= v_counter DO
                INSERT INTO user_throwns (user_id, thrown_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
            
            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM pistols;
            WHILE v_index <= v_counter DO
                INSERT INTO user_pistols (user_id, pistol_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM warframes;
            WHILE v_index <= v_counter DO
                INSERT INTO user_warframes (user_id, warframe_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
            
            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM sentinels;
            WHILE v_index <= v_counter DO
                INSERT INTO user_sentinels (user_id, sentinel_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM collars;
            WHILE v_index <= v_counter DO
                INSERT INTO user_collars (user_id, collar_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM archwings;
            WHILE v_index <= v_counter DO
                INSERT INTO user_archwings (user_id, archwing_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
        END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_fill_user`');
    }
}

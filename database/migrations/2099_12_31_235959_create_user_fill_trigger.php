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

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM melees;
            WHILE v_index <= v_counter DO
                INSERT INTO user_melees (user_id, melee_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM fists;
            WHILE v_index <= v_counter DO
                INSERT INTO user_fists (user_id, fist_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM staffs;
            WHILE v_index <= v_counter DO
                INSERT INTO user_staffs (user_id, staff_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM hammers;
            WHILE v_index <= v_counter DO
                INSERT INTO user_hammers (user_id, hammer_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM glaives;
            WHILE v_index <= v_counter DO
                INSERT INTO user_glaives (user_id, glaive_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM sparrings;
            WHILE v_index <= v_counter DO
                INSERT INTO user_sparrings (user_id, sparring_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM nikanas;
            WHILE v_index <= v_counter DO
                INSERT INTO user_nikanas (user_id, nikana_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM nunchakus;
            WHILE v_index <= v_counter DO
                INSERT INTO user_nunchakus (user_id, nunchaku_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM sword_shields;
            WHILE v_index <= v_counter DO
                INSERT INTO user_sword_shields (user_id, sword_shield_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM thrown;
            WHILE v_index <= v_counter DO
                INSERT INTO user_throwns (user_id, thrown_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM warframe;
            WHILE v_index <= v_counter DO
                INSERT INTO user_warframes (user_id, warframe_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM speargun;
            WHILE v_index <= v_counter DO
                INSERT INTO user_spearguns (user_id, speargun_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;

            SET v_index = 1;

            SELECT count(*) INTO v_counter FROM archgun;
            WHILE v_index <= v_counter DO
                INSERT INTO user_archguns (user_id, archguns_id) VALUES (NEW.id, v_index);
                SET v_index = v_index + 1;
            END WHILE;
        END
        ');
         
        /* _    ___  _____  ___  ___    ___  ___  ___    _  _____  ___  __      __ ___    _    ___   ___   _  _ 
          /_\  | __||_   _|| __|| _ \  / __|| _ \| __|  /_\|_   _|| __| \ \    / /| __|  /_\  | _ \ / _ \ | \| |
         / _ \ | _|   | |  | _| |   / | (__ |   /| _|  / _ \ | |  | _|   \ \/\/ / | _|  / _ \ |  _/| (_) || .` |
        /_/ \_\|_|    |_|  |___||_|_\  \___||_|_\|___|/_/ \_\|_|  |___|   \_/\_/  |___|/_/ \_\|_|   \___/ |_|\_| */

        /* 01 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_ak_weapons AFTER INSERT ON ak_weapons FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_ak_weapons (user_id, ak_weapon_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 02 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_archwings AFTER INSERT ON archwings FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_archwings (user_id, archwing_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 03 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_bows AFTER INSERT ON bows FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_bows (user_id, bow_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 04 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_collars AFTER INSERT ON collars FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_collars (user_id, collar_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 05 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_crossbows AFTER INSERT ON crossbows FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_crossbows (user_id, crossbow_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 06 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_dual_pistols AFTER INSERT ON dual_pistols FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_dual_pistols (user_id, dual_pistol_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 07 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_fists AFTER INSERT ON fists FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_fists (user_id, fist_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 08 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_glaives AFTER INSERT ON glaives FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_glaives (user_id, glaive_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 09 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_hammers AFTER INSERT ON hammers FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_hammers (user_id, hammer_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 10 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_melees AFTER INSERT ON melees FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_melees (user_id, melee_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 11 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_nikanas AFTER INSERT ON nikanas FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_nikanas (user_id, nikana_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 12 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_nunchakus AFTER INSERT ON nunchakus FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_nunchakus (user_id, nunchaku_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 13 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_pistols AFTER INSERT ON pistols FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_pistols (user_id, pistol_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 14 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_rifles AFTER INSERT ON rifles FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_rifles (user_id, rifle_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 15 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_sec_crossbows AFTER INSERT ON sec_crossbows FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_sec_crossbows (user_id, sec_crossbow_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 16 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_sentinels AFTER INSERT ON sentinels FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_sentinels (user_id, sentinel_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 17 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_shotguns AFTER INSERT ON shotguns FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_shotguns (user_id, shotgun_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 18 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_shotgun_sidearms AFTER INSERT ON shotgun_sidearms FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_shotgun_sidearms (user_id, shotgun_sidearm_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 19 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_sparrings AFTER INSERT ON sparrings FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_sparrings (user_id, sparring_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 20 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_staffs AFTER INSERT ON staffs FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_staffs (user_id, staff_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 21 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_sword_shields AFTER INSERT ON sword_shields FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_sword_shields (user_id, sword_shield_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 22 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_throwns AFTER INSERT ON throwns FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_throwns (user_id, thrown_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 23 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_warframes AFTER INSERT ON warframes FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_warframes (user_id, warframe_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 24 */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_spearguns AFTER INSERT ON spearguns FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_spearguns (user_id, speargun_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');

        /* 25 - Archguns */
        DB::unprepared('
        CREATE TRIGGER tr_fill_user_archguns AFTER INSERT ON archguns FOR EACH ROW
        BEGIN
            DECLARE c_user_id INT;
            DECLARE done INT default FALSE;
            DECLARE cursor_i CURSOR FOR SELECT id FROM users;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

            OPEN cursor_i;
            insert_loop: LOOP
                FETCH cursor_i INTO c_user_id;
                IF done THEN
                    LEAVE insert_loop;
                END IF;
                INSERT INTO user_archguns (user_id, archguns_id) VALUES (c_user_id, NEW.id);
            END LOOP;
            CLOSE cursor_i;
        END
        ');
    }

    public function down()
    {
        /* 00 */ DB::unprepared('DROP TRIGGER `tr_fill_user`');
        /* 01 */ DB::unprepared('DROP TRIGGER `tr_fill_user_ak_weapons`');
        /* 02 */ DB::unprepared('DROP TRIGGER `tr_fill_user_archwings`');
        /* 03 */ DB::unprepared('DROP TRIGGER `tr_fill_user_bows`');
        /* 04 */ DB::unprepared('DROP TRIGGER `tr_fill_user_collars`');
        /* 05 */ DB::unprepared('DROP TRIGGER `tr_fill_user_crossbows`');
        /* 06 */ DB::unprepared('DROP TRIGGER `tr_fill_user_dual_pistols`');
        /* 07 */ DB::unprepared('DROP TRIGGER `tr_fill_user_fists`');
        /* 08 */ DB::unprepared('DROP TRIGGER `tr_fill_user_glaives`');
        /* 09 */ DB::unprepared('DROP TRIGGER `tr_fill_user_hammers`');
        /* 10 */ DB::unprepared('DROP TRIGGER `tr_fill_user_melees`');
        /* 11 */ DB::unprepared('DROP TRIGGER `tr_fill_user_nikanas`');
        /* 12 */ DB::unprepared('DROP TRIGGER `tr_fill_user_nunchakus`');
        /* 13 */ DB::unprepared('DROP TRIGGER `tr_fill_user_pistols`');
        /* 14 */ DB::unprepared('DROP TRIGGER `tr_fill_user_rifles`');
        /* 15 */ DB::unprepared('DROP TRIGGER `tr_fill_user_sec_crossbows`');
        /* 16 */ DB::unprepared('DROP TRIGGER `tr_fill_user_sentinels`');
        /* 17 */ DB::unprepared('DROP TRIGGER `tr_fill_user_shotguns`');
        /* 18 */ DB::unprepared('DROP TRIGGER `tr_fill_user_shotgun_sidearms`');
        /* 19 */ DB::unprepared('DROP TRIGGER `tr_fill_user_sparrings`');
        /* 20 */ DB::unprepared('DROP TRIGGER `tr_fill_user_staffs`');
        /* 21 */ DB::unprepared('DROP TRIGGER `tr_fill_user_sword_shields`');
        /* 22 */ DB::unprepared('DROP TRIGGER `tr_fill_user_throwns`');
        /* 23 */ DB::unprepared('DROP TRIGGER `tr_fill_user_warframes`');
        /* 24 */ DB::unprepared('DROP TRIGGER `tr_fill_user_spearguns`');
        /* 25 */ DB::unprepared('DROP TRIGGER `tr_fill_user_archguns`');
    }
}

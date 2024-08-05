<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the stored procedure
        DB::unprepared('
            CREATE PROCEDURE DeleteExpiredFieldworks()
            BEGIN
                DECLARE done INT DEFAULT 0;
                DECLARE fieldworkID INT;

                DECLARE fieldwork_cursor CURSOR FOR
                SELECT f.fieldworkID
                FROM fieldworks f
                JOIN employers e ON f.employerID = e.employerID
                WHERE e.applicationDeadline < CURDATE() AND f.confirmed != "yes";

                DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

                OPEN fieldwork_cursor;

                fetch_loop: LOOP
                    FETCH fieldwork_cursor INTO fieldworkID;
                    IF done THEN
                        LEAVE fetch_loop;
                    END IF;

                    DELETE FROM fieldworks WHERE fieldworkID = fieldworkID;
                END LOOP;

                CLOSE fieldwork_cursor;
            END;
        ');

        // Create the event to call the stored procedure every minute
        DB::unprepared('
            CREATE EVENT IF NOT EXISTS DeleteExpiredFieldworksEvent
            ON SCHEDULE EVERY 1 MINUTE
            DO
            CALL DeleteExpiredFieldworks();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the event
        DB::unprepared('DROP EVENT IF EXISTS DeleteExpiredFieldworksEvent');

        // Drop the stored procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS DeleteExpiredFieldworks');
    }
};
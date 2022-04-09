<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateTriggerReservasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            '
        CREATE TRIGGER Kurang_tipe_room
        AFTER INSERT ON reservations
        FOR EACH ROW
        BEGIN
        UPDATE room_tipes SET stock = stock - new.quantity WHERE id = new.id_room_tipe;
        END'
        );

        $procedure = "DROP PROCEDURE IF EXISTS `cektamu`;
            CREATE PROCEDURE `cektamu` (IN idx int)
            BEGIN
            SELECT nama_tamu,tgl_masuk FROM reservations;
            END;";

        \DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER Kurang_tipe_room');
        // DB::unprepared('DROP PROCEDURE cektamu');
    }
}

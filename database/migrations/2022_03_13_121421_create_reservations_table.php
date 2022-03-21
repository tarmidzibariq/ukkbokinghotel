<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->integer('no_telp');
            $table->string('nama_tamu');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->integer('jumlah_kamar');
            $table->integer('total');
            $table->integer('id_room')->nullable();
            $table->integer('id_room_tipe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}

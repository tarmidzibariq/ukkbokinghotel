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
            $table->string('no_telp');
            $table->string('nama_tamu');
            $table->integer('tamu'); //jumlah tamu
            $table->string('tgl_masuk');//date
            $table->string('tgl_keluar');//date
            $table->integer('quantity'); // jumlah kamar
            $table->integer('total');
            $table->string('status')->nullable();
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

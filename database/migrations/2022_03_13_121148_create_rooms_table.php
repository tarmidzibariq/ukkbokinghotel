<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kamar');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->string('kapasitas');
            $table->date('tgl_tersedia')->nullable();
            // $table->date('tgl_tutup');
            $table->integer('harga');
            $table->string('status'); // 1 atau 2 dan 3
            $table->integer('id_room_tipe');
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
        Schema::dropIfExists('rooms');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'bariq',
            'email' => 'bariq@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Resepsionis',
        ]);
        DB::table('room_tipes')->insert([
            'nama'=>'Superior'
        ]);
        DB::table('room_tipes')->insert([
            'nama'=>'Deluxe'
        ]);
        DB::table('rooms')->insert([
            'kode_kamar' => 'ROSE01',
            'gambar' => 'zZE3NfSyhT4lpMTFP1fNKvJkLrjHujvk1AZ8LCc5.jpg',
            'deskripsi' => 'dengan ruangan yang mewah dan pelayanan yang terbaik',
            'kapasitas' => '2',
            'tgl_tersedia' => '2022-03-16',
            'harga' => '500000',
            'status' => '1',
            'id_room_tipe' => '1',
        ]);
    }
}

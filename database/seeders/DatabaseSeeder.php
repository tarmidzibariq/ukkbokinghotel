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
        DB::table('rooms')->insert([
            'kode_kamar' => 'ROSE01',
            'id_room_tipe' => '1',
            'status' => '0',
        ]);
        DB::table('rooms')->insert([
            'kode_kamar' => 'ROSE02',
            'id_room_tipe' => '2',
            'status' => '0',
        ]);
        DB::table('rooms')->insert([
            'kode_kamar' =>'ROSE03',
            'id_room_tipe' =>'1',
            'status'=>'0',
        ]);
        DB::table('rooms')->insert([
            'kode_kamar' =>'ROSE04',
            'id_room_tipe' =>'3',
            'status'=>'0',
        ]);
        DB::table('rooms')->insert([
            'kode_kamar' =>'ROSE05',
            'id_room_tipe' =>'3',
            'status'=>'0',
        ]);
        DB::table('rooms')->insert([
            'kode_kamar' =>'ROSE06',
            'id_room_tipe' =>'3',
            'status'=>'0',
        ]);
        DB::table('room_tipes')->insert([
            'nama'=>'Superior',
            'harga'=>'500000',
            'deskripsi'=> 'Pemandangan danau, Pemandangan taman, Pemandangan gunung',
            'kapasitas'=> '2 Tamu',
            'gambar' => 'roomhotel1.jpg',
        ]);
        DB::table('room_tipes')->insert([
            'nama' => 'Deluxe',
            'harga' => '350000',
            'deskripsi' => 'Wi-Fi gratis',
            'kapasitas' => '2 Tamu',
            'gambar' => 'roomhotel2.jpg',
        ]);
        DB::table('room_tipes')->insert([
            'nama' => 'Executive',
            'harga' => '400000',
            'deskripsi' => 'Wi-Fi gratis, Parkir mandiri gratis,',
            'kapasitas' => '2 Tamu',
            'gambar' => 'roomhotel3.jpg',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => '2 bath singel',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Peralatan mandi',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Shower',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Brankas',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Toilet',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Lantai kayu/parket',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Handuk',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Pengering rambut',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Jam alarm/layanan bangun tidur',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Stop kontak dekat tempat tidur',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '1',
            'nama_barang' => 'Meja kerja',
        ]);

        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '2',
            'nama_barang' => '1 bath singel',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '2',
            'nama_barang' => 'Peralatan mandi',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '2',
            'nama_barang' => 'Shower',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '2',
            'nama_barang' => 'Toilet',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '2',
            'nama_barang' => 'Lantai kayu/parket',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '2',
            'nama_barang' => 'Handuk',
        ]);

        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => '1 bath singel',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => 'Peralatan mandi',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => 'Shower',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => 'Toilet',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => 'Lantai kayu/parket',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => 'Handuk',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => 'Pengering rambut',
        ]);
        DB::table('facility_rooms')->insert([
            'id_room_tipe' => '3',
            'nama_barang' => 'Jam alarm/layanan bangun tidur',
        ]);
        
        // DB::table('rooms')->insert([
        //     'kode_kamar' =>'ROSE03',
        //     'id_room_tipe' =>'1',
        //     'status'=>'0',
        // ]);
        // DB::table('rooms')->insert([
        //     'kode_kamar' => 'ROSE01',
        //     'gambar' => 'roomhotel1.jpg',
        //     'deskripsi' => 'dengan ruangan yang mewah dan pelayanan yang terbaik',
        //     'kapasitas' => '2',
        //     'tgl_tersedia' => '2022-03-16',
        //     'harga' => '500000',
        //     'status' => '1',
        //     'id_room_tipe' => '1',
        // ]);
        // DB::table('rooms')->insert([
        //     'kode_kamar' => 'ROSE02',
        //     'gambar' => 'roomhotel2.jpg',
        //     'deskripsi' => 'dengan ruangan yang mewah dan pelayanan yang terbaik',
        //     'kapasitas' => '2',
        //     'tgl_tersedia' => '2022-03-18',
        //     'harga' => '350000',
        //     'status' => '1',
        //     'id_room_tipe' => '2',
        // ]);
        DB::table('facility_hotels')->insert([
            'nama_barang' => 'Swimming Pool',
            'gambar' => 'kolam.jpg',
        ]);
        DB::table('facility_hotels')->insert([
            'nama_barang' => 'Gym Fitness',
            'gambar' => 'gym.jpg',
        ]);
    }
}

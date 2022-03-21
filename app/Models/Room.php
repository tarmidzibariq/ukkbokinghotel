<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_kamar',
        // 'gambar',
        // 'deskripsi',
        // 'kapasitas',
        // 'tgl_tersedia',
        // 'harga',
        'status',
        'id_room_tipe',

    ];
    protected $table = 'rooms';

    // public function FacilityRoom()
    // {
    //     return $this->hasMany('App\Models\FacilityRoom');
    // }  
    public function Reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }
    public function rooms()
    {
        return $this->belongsTo('App\Models\Roomtipe', 'id_room_tipe', 'id');
    }
}

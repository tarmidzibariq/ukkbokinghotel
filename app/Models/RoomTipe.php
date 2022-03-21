<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'kapasitas',
        'stock',
        'gambar',
    ];
    protected $table = 'room_tipes';

    public function Room()
    {
        return $this->hasMany('App\Models\Room');
    }
    public function FacilityRoom()
    {
        return $this->hasMany('App\Models\FacilityRoom');
    }  
}

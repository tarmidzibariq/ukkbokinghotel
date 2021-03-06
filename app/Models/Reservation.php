<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'nama_tamu',
        'tamu',
        'tgl_masuk',
        'tgl_keluar',
        'quantity',
        'total',
        'status',
        'id_room',
        'id_room_tipe',

    ];
    protected $table = 'reservations';

    public function rooms()
    {
        return $this->belongsTo('App\Models\Room', 'id_room', 'id');
    }
    public function OrderRoom()
    {
        return $this->hasMany('App\Models\OrderRoom');
    }
}

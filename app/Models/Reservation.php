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
        'tgl_masuk',
        'tgl_keluar',
        'dewasa',
        'anak',
        // 'bukti_cek',
        'id_room',

    ];
    protected $table = 'reservations';

    public function rooms()
    {
        return $this->belongsTo('App\Models\Room', 'id_room', 'id');
    }
}

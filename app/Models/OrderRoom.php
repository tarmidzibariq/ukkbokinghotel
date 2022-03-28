<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_reservation',
        'id_room',
    ];
    protected $table = 'order_rooms';

    public function Reservation()
    {
        return $this->belongsTo('App\Models\Reservation', 'id_reservation', 'id');
    }
    public function rooms()
    {
        return $this->belongsTo('App\Models\Room', 'id_room', 'id');
    }
}

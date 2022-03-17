<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_room',
        'nama_barang',

    ];
    protected $table = 'facility_rooms';

    public function rooms()
    {
        return $this->belongsTo('App\Models\Room', 'id_room', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityHotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'banyak_barang',
        'gambar',

    ];
    protected $table = 'facility_hotels';
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reservation = Reservation::orderBy('id','DESC')->get();
        return view('resepsionis.reservation.index',compact('reservation'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FacilityHotel;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\FacilityRoom;
use App\Models\RoomTipe;
class DashboardDefaultController extends Controller
{
    public function index()
    {
        $room = Room::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $facilityroom = FacilityRoom::all();
        $roomtipe = RoomTipe::all();
        $facilityhotel = FacilityHotel::all();
        // dd($facilityroom);
        return view('defaulthome',compact('room', 'facilityroom', 'roomtipe', 'facilityhotel'));
    }
}

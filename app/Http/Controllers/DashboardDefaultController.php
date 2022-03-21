<?php

namespace App\Http\Controllers;

use App\Models\FacilityHotel;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\FacilityRoom;
use App\Models\RoomTipe;
use App\Models\Reservation;
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
    public function forminput()
    {
        
        return view('form-input');
    }
    
    public function store(Request $request)
    {
        $tgl_mulai = $request->tgl_mulai;
        $tgl_keluar = $request->tgl_keluar;
        $tamu = $request->tamu;

        $roomtipe= RoomTipe::orderBy('id', 'DESC')->get();
        $facilityroom = FacilityRoom::all();
        return view('form-input', compact('tgl_mulai','tgl_keluar','tamu','roomtipe', 'facilityroom'));
    }

    public function storeup(Request $request)
    {
        dd($request);
        $tgl_mulai = $request->tgl_mulai;
        $tgl_keluar = $request->tgl_keluar;
        $tamu = $request->tamu;
    }
}

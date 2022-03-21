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

        // $
        // dd($tgl_mulai);
        // $stock = RoomTipe::orderBy('created_at','DESC')->get();

        // $stock = 0;
        // if ($stock == 0) {
        //     $roomtipe = RoomTipe::where('stock',$stock)->get();
        // }else{
        //     $roomtipe = RoomTipe::all();
        // }
        // foreach ($stock as $key ) {

        //     // print_r($key->stock);
        //     if ($key->stock > 0) {
        //         echo RoomTipe::where('stock', $key->stock)->get();
        //         // echo $key->nama;
        //     } 
            
        // }
        $roomtipe= RoomTipe::orderBy('id', 'DESC')->get();
        $facilityroom = FacilityRoom::all();
        // dd($stock);

        // dd($roomtipe); 
        return view('form-input', compact('tgl_mulai','tgl_keluar','tamu','roomtipe', 'facilityroom'));
    }
}

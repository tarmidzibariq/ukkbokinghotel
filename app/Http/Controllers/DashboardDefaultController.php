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
        $tgl_masuk = $request->tgl_masuk;
        $tgl_keluar = $request->tgl_keluar;
        $tamu = $request->tamu;

        $roomtipe= RoomTipe::orderBy('id', 'DESC')->get();
        $facilityroom = FacilityRoom::all();
        return view('form-input', compact('tgl_masuk','tgl_keluar','tamu','roomtipe', 'facilityroom'));
    }

    public function storeup(Request $request,$id)
    {
        // dd($request);
        $tgl_masuk = $request->tgl_masuk;
        $tgl_keluar = $request->tgl_keluar;
        $tamu = $request->tamu;
        $quantity = $request->quantity;
        $roomtipe = RoomTipe::find($id);
        // dd($roomtipe);
        return view('form-reservasi', compact('tgl_masuk', 'tgl_keluar', 'tamu','quantity','roomtipe'));

    }

    public function check(Request $request, $id)
    {
        // dd($request);   
        Reservation::create([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'no_telp'=> $request->no_telp,
            'nama_tamu'=> $request->nama_tamu,
            'tamu'=> $request->tamu,
            'tgl_masuk'=> $request->tgl_masuk,
            'tgl_keluar'=> $request->tgl_keluar,
            'quantity'=> $request->quantity,
            'total'=> $request->total,
            'id_room_tipe'=> $request->id_room_tipe,
        ]);
        return redirect()->route('index');
    }
}

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

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'no_telp'=>'required',
            'nama_tamu'=>'required',
            'tgl_masuk'=>'required',
            'tgl_keluar'=>'required',
            'id_room_tipe'=>'required',
            'jumlah_kamar'=>'required',
        ]);
        Reservation::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'no_telp'=>$request->no_telp,
            'nama_tamu'=>$request->nama_tamu,
            'tgl_masuk'=>$request->tgl_masuk,
            'tgl_keluar'=>$request->tgl_keluar,
            'tgl_room_tipe'=>$request->tgl_room_tipe,
            'jumlah_kamar'=>$request->jumlah_kamar,
        ]);
        return redirect()->route('index');
    }
}

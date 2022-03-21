<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomTipe;
use Brick\Math\BigNumber;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::orderBy('created_at', 'DESC')->get();
        $roomkode = Room::all()->count() + 1;
        $roomtipe = RoomTipe::orderBy('created_at', 'DESC')->get();
        // dd($room);
        return view('admin.room.index', compact('room','roomkode','roomtipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $random = Str::random(number);
        // dd($random);

        $room = Room::all()->count()+1;
        $roomtipe = RoomTipe::orderBy('created_at','DESC')->get();
        // dd(BigNumber($room));
        return view('admin.room.create',compact('room','roomtipe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'kode_kamar' => 'required|unique:rooms',
            'id_room_tipe' => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        // $gambar = $request->file('gambar');
        // $gambar->storeAs('public/rooms', $gambar->hashName());
        Room::create([
            'kode_kamar' => $request->kode_kamar,
            'id_room_tipe' => $request->id_room_tipe,
            // 'gambar' => $gambar->hashName(),
            'status' => 0,
        ]);
        return redirect('room');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $roomtipe = RoomTipe::orderBy('created_at', 'DESC')->get();
        return view('admin.room.edit',compact('room', 'roomtipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        // $room = Room::find($id);
        // dd($room->gambar);
            $update = Room::find($id)->update([
                'id_room_tipe' => $request->id_room_tipe,
            ]);
        return redirect('room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        // dd($room);
        Storage::disk('local')->delete('public/rooms/'.basename($room->gambar));

        Room::find($id)->delete();
        return redirect('room');
    }

    public function nonactive(Request $request, $id)
    {
        // dd($id);
        $id_room_tipe = $request->id_room_tipe;

        // cari id di table room_tipe
        $roomtipe = RoomTipe::find($id_room_tipe);

        // get table room_tipe yg ada stock nya
        $stock = $roomtipe->stock;
        // dd($stock+1);
        $update = Room::find($id)->update([
            'status' => 0,
        ]);

        $update = RoomTipe::find($id_room_tipe)->update([
            'stock' => $stock - 1,
        ]);
        return redirect('room');
    }
    public function active(Request $request, $id)
    {
        // dd($id_room_tipe);
        
        // $roomtipeupdate = $roomtipe->where('id',$id)->nama;
        // dd($roomtipeupdate);
        
        $id_room_tipe = $request->id_room_tipe;
        
        // cari id di table room_tipe
        $roomtipe = RoomTipe::find($id_room_tipe);

        // get table room_tipe yg ada stock nya
        $stock = $roomtipe->stock;
        // dd($stock+1);
        
        $update = Room::find($id)->update([
            'status' => 1,
        ]);

        $update = RoomTipe::find($id_room_tipe)->update([
            'stock' => $stock + 1,
        ]);
        // $up = RoomTipe::
        return redirect('room');
    }
}

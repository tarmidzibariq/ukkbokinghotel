<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\FacilityRoom;
class FacilityRoomController extends Controller
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
        $facilityroom = FacilityRoom::orderBy('created_at', 'DESC')->get();
        return view('admin.fasilitas-room.index',compact('facilityroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = Room::orderBy('created_at', 'DESC')->get();
        // dd($room);
        return view('admin.fasilitas-room.create',compact('room'));
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
            'id_room' => 'required',
            'nama_barang' => 'required',
        ]);
        FacilityRoom::create([
            'id_room' => $request->id_room,
            'nama_barang' => $request->nama_barang,
        ]);
        return redirect('facility-room');
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

        $facilityroom = FacilityRoom::find($id);
        $room = Room::orderBy('created_at', 'DESC')->get();
        return view('admin.fasilitas-room.edit', compact('facilityroom','room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = FacilityRoom::find($id)->update([
            'id_room' => $request->id_room,
            'nama_barang' => $request->nama_barang,
        ]);
        return redirect('facility-room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        FacilityRoom::find($id)->delete();
        return redirect('facility-room');
    }
}

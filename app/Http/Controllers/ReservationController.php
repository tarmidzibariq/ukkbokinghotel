<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\RoomTipe;
use App\Models\Room;
use App\Models\OrderRoom;
class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $nama = $request->nama_tamu;
        $tgl = $request->tgl;
        $id_room_tipe = $request->id_room_tipe;
        $status = $request->status;
        $nama_tamu = Reservation::orderBy('id', 'DESC')->get();
        $roomtipe = RoomTipe::orderBy('id', 'DESC')->get();
        $reservation = Reservation::where('nama_tamu','LIKE','%'.$nama.'%')
                                    ->where('tgl_masuk', 'LIKE', '%' . $tgl . '%')
                                    ->where('id_room_tipe', 'LIKE', '%' . $id_room_tipe . '%')
                                    ->where('status', 'LIKE', '%' . $status . '%')->orderBy('id','DESC')->get();
                                    
        $selectroom = Room::all();
        // dd($selectroom);
        return view('resepsionis.reservation.index',compact('reservation','nama_tamu','roomtipe','nama','tgl', 'id_room_tipe','status', 'selectroom'));
    }
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $selectroom = Room::all();   
        $orderroom=OrderRoom::all();
        return view('resepsionis.reservation.edit',compact('reservation','selectroom', 'orderroom'));
    }
    public function updatebooking(Request $request, $id)
    {
        $update = Reservation::find($id)->update([
            'status' => 2,
        ]);
        return redirect()->route('reservasi.index');
    }
    public function updatecekin(Request $request, $id)
    {
        $update = Reservation::find($id)->update([
            'status' => 3,
        ]);
        return redirect()->route('reservasi.index');
    }
    public function updatecekout(Request $request, $id)
    {
        $update = Reservation::find($id)->update([
            'status' => 0,
        ]);
        $id_room_tipe = $request->id_room_tipe;
        $triger = $request->stock + $request->quantity;
        // $roomstock = RoomTipe::where('id',$id_room_tipe)->where('stock')->get();
        // dd($roomstock);
        $update = RoomTipe::find($id_room_tipe)->update([
            'stock'=> $triger ,
        ]);
        return redirect()->route('reservasi.index');
    }
    // public function update(Request $request, $id)
    // {
    //     $room1 = $request->id_room1;
    //     $room2 = [$request->id_room1,$request->id_room2];
    //     $room3 = [$request->id_room1,$request->id_room2, $request->id_room3];
    //     $room4 = [$request->id_room1,$request->id_room2, $request->id_room3, $request->id_room4];
    //     if ($room3) {
    //         $update = Reservation::find($id)->update([
    //             'status' => $request->status,
    //         ]);

    //         $update = OrderRoom::create([
    //             'id_reservation' => $id,
    //             'id_room' => $request->id_room1,
    //         ]);

    //         $update = OrderRoom::create([
    //             'id_reservation' => $id,
    //             'id_room' => $request->id_room2,
    //         ]);
    //         $update = OrderRoom::create([
    //             'id_reservation' => $id,
    //             'id_room' => $request->id_room3,
    //         ]);
    //     }elseif ($room2){
    //         $update = Reservation::find($id)->update([
    //             'status'=>$request->status,
    //         ]);
            
    //         $update = OrderRoom::create([
    //             'id_reservation' => $id,
    //             'id_room' => $request->id_room1,
    //         ]);

    //         $update = OrderRoom::create([
    //             'id_reservation' => $id,
    //             'id_room' => $request->id_room2,
    //         ]);
    //     }elseif ($room1) {
    //         $update = Reservation::find($id)->update([
    //             'status' => $request->status,
    //         ]);

    //         $update = OrderRoom::create([
    //             'id_reservation' => $id,
    //             'id_room' => $request->id_room1,
    //         ]);
    //     }else{
    //         $update = Reservation::find($id)->update([
    //             'status' => $request->status,
    //         ]);
    //     }
    //     if ($update) {
    //         return redirect()
    //             ->route('reservasi.index')
    //             ->with([
    //                 'success' => 'New post has been created successfully'
    //             ]);
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Some problem occurred, please try again'
    //             ]);
    //     }
    // }


    // public function filter(Request $request)
    // {
    //     // dd($request);
    //     $nama = $request->nama_tamu;
    //     $tgl = $request->tgl;
    //     $semua=[$nama,$tgl];
    //     if ($tgl) {
    //         $reservation = Reservation::where('tgl_masuk', $tgl)->get();
    //     }elseif($nama){
    //         $reservation = Reservation::where('nama_tamu', $nama)->get();
    //     } 
    //     $reservation = Reservation::where('nama_tamu', $nama)->where('tgl_masuk', $tgl)->get();
        
    //     $nama_tamu = Reservation::orderBy('id', 'DESC')->get();
    //     return view('resepsionis.reservation.index', compact('reservation', 'nama_tamu','nama','tgl'));
    // }
}

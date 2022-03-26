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
    public function index(Request $request)
    {
        $nama = $request->nama_tamu;
        $tgl = $request->tgl;
        $nama_tamu = Reservation::orderBy('id', 'DESC')->get();
        $reservation = Reservation::where('nama_tamu','LIKE','%'.$nama.'%')->where('tgl_masuk', 'LIKE', '%' . $tgl . '%')->orderBy('id','DESC')->get();
        return view('resepsionis.reservation.index',compact('reservation','nama_tamu','nama','tgl'));
    }

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

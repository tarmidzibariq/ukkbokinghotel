<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomTipe;
class RoomTipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roomtipe = RoomTipe::orderBy('created_at','DESC')->get();
        return view('admin.room-tipe.index',compact('roomtipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room-tipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'kapasitas'=>'required',
            'harga'=>'required',
            'deskripsi'=>'required',
        ]);
        RoomTipe::create([
            'nama'=>$request->nama,
            'kapasitas'=>$request->kapasitas,
            'harga'=>$request->harga,
            'deskripsi'=>$request->deskripsi,
        ]);
        return redirect('room-tipe');
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
        $roomtipe = RoomTipe::find($id);
        return view('admin.room-tipe.edit', compact('roomtipe'));
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
        $update = RoomTipe::find($id)->update([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('room-tipe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomTipe::find($id)->delete();
        return redirect('room-tipe');
    }
}

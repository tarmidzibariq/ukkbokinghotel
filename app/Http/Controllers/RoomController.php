<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
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
        // dd($room);
        return view('admin.room.index', compact('room'));
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
        // dd(BigNumber($room));
        return view('admin.room.create',compact('room'));
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
            'tgl_tersedia' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/rooms', $gambar->hashName());
        Room::create([
            'kode_kamar' => $request->kode_kamar,
            'tgl_tersedia' => $request->tgl_tersedia,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar->hashName(),
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
        return view('admin.room.edit',compact('room'));
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
        $room = Room::find($id);
        // dd($room->gambar);
        if ($request->file('gambar')) {

            $request->validate([
                'gambar' => 'image|mimes:jpeg,jpg,png',
            ]);

            Storage::disk('local')->delete('public/rooms/'.basename($room->gambar));
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/rooms', $gambar->hashName());
            $update = Room::find($id)->update([
                // 'kode_kamar' => $request->kode_kamar,
                'tgl_tersedia' => $request->tgl_tersedia,
                'kapasitas' => $request->kapasitas,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambar->hashName(),
            ]);
        }else{
            $update = Room::find($id)->update([
                'tgl_tersedia' => $request->tgl_tersedia,
                'kapasitas' => $request->kapasitas,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
            ]);
        }
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
        $update = Room::find($id)->update([
            'status' => 0,
        ]);
        return redirect('room');
    }
    public function active(Request $request, $id)
    {
        $update = Room::find($id)->update([
            'status' => 1,
        ]);
        return redirect('room');
    }
}

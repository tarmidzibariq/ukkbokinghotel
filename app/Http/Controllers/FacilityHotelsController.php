<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FacilityHotel;
use File;
class FacilityHotelsController extends Controller
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
        $facilityhotel = FacilityHotel::orderBy('created_at', 'DESC')->get();
        return view('admin.fasilitas-hotel.index',compact('facilityhotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fasilitas-hotel.create');
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
            'nama_barang' => 'required',
            'banyak_barang' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $gambar = $request->file('gambar');
        $namaFile = time() . rand(100, 999) . "." . $gambar->getClientOriginalExtension();
        $gambar->move(public_path() . '/upload-image/facilityhotel', $namaFile);
        // $gambar->storeAs('public/facilityhotel', $gambar->hashName());
        FacilityHotel::create([
            'nama_barang' => $request->nama_barang,
            'banyak_barang' => $request->banyak_barang,
            'gambar' => $namaFile,
        ]);
        return redirect('facility-hotels');
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
        $facilityhotel = FacilityHotel::find($id);
        return view('admin.fasilitas-hotel.edit',compact('facilityhotel'));
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
        $facilityhotel= FacilityHotel::find($id);
        // dd($room->gambar);
        if ($request->file('gambar')) {

            $request->validate([
                'gambar' => 'image|mimes:jpeg,jpg,png',
            ]);

            // Storage::disk('local')->delete('public/facilityhotel/' . basename($facilityhotel->gambar));
            File::delete(public_path() . "/upload-image/facilityhotel/$facilityhotel->gambar");
            $gambar = $request->file('gambar');
            // $gambar->storeAs('public/facilityhotel', $gambar->hashName());
            $namaFile = time() . rand(100, 999) . "." . $gambar->getClientOriginalExtension();
            $gambar->move(public_path() . '/upload-image/facilityhotel', $namaFile);
            $update = FacilityHotel::find($id)->update([
                'nama_barang' => $request->nama_barang,
                'banyak_barang' => $request->banyak_barang,
                'gambar' => $namaFile,
            ]);
        } else {
            $update = FacilityHotel::find($id)->update([
                'nama_barang' => $request->nama_barang,
                'banyak_barang' => $request->banyak_barang,
            ]);
        }
        return redirect('facility-hotels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facilityhotel = FacilityHotel::find($id);
        // dd($facilityhotel);
        // Storage::disk('local')->delete('public/facilityhotel/' . basename($facilityhotel->gambar));
        File::delete(public_path() . "/upload-image/facilityhotel/$facilityhotel->gambar");
        
        FacilityHotel::find($id)->delete();
        return redirect('facility-hotels');
    }
}

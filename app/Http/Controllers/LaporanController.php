<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reservation = Reservation::select(
            DB::raw('count(id) as `jumlah`'),
            DB::raw('sum(total) as `total`'),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as created_at")
        )
            ->groupBy('created_at')->orderBy('created_at','asc')->get();
        // $total = Reservation::sum('biaya');
        return view('resepsionis.laporan.index',compact('reservation'));
    }
}

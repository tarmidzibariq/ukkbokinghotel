@extends('master')
@section('content')
<style>
    @media (min-width: 992px) {
        .card-gambar {
            width: 40%;
        }
    }

    .btn-outline {
        color: rgba(0, 0, 0, .5);
        transition: 0.5s;
    }

    .btn-outline:hover {
        color: #4e73df;
    }

</style>
<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between ">
            <div>
                <a href="{{ route('reservasi.index') }}" class=" "><i
                        class="fas fa-backspace fa-sm btn-outline "></a></i>&nbsp; <span>Detail Data</span>
            </div>
            @if ($reservation->status == '0')
            <a href="#" type="submit" class="btn btn-danger btn-icon-split btn-sm">
                <span class="text">Cancel</span>
            </a>
            @endif
            @if ($reservation->status == '1')
            <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                <span class="text">Booking</span>
            </a>
            @endif
            @if ($reservation->status == '2')
            <a href="#" class="btn btn-info btn-icon-split btn-sm">
                <span class="text">Cek-in</span>
            </a>
            @endif
            @if ($reservation->status == '3')
            <a href="#" class="btn btn-success btn-icon-split btn-sm">
                <span class="text">Cek-out</span>
            </a>
            @endif

        </div>
    </div>
    @php
    $caristatus = array (
    array(0,'Cancel'),
    array(1,'Booking'),
    array(2,'Cek-in'),
    array(3,'Cek-out'),
    );
    // dd($caristatus[0][1]);
    @endphp
    @php
    $select = $selectroom->where('id_room_tipe',$reservation->id_room_tipe);
    @endphp
    <form action="" method="post" enctype="multipart/form-data">
        {{-- @csrf --}}
        <div class="card-body">
            <div class="row">
                <input type="hidden" class="form-control " id="id" name="id" value="" />
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Nama Pemesan</label>
                    <input type="text" value="{{ $reservation->nama }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Email</label>
                    <input type="text" value="{{ $reservation->email }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Nomor Telephone</label>
                    <input type="text" value="{{ $reservation->no_telp }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Nama Tamu</label>
                    <input type="text" value="{{ $reservation->nama_tamu }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Jumlah Tamu</label>
                    <input type="text" value="{{ $reservation->tamu }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Tipe Kamar</label>
                    <input type="text" value="{{ $roomtipe->where('id',$reservation->id_room_tipe)->first()->nama }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Jumlah Kamar Dipesan</label>
                    <input type="text" value="{{ $reservation->quantity }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Total</label>
                    <input type="text" value="{{ 'IDR '.number_format($reservation->total) }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Cek-in</label>
                    <input type="text" value="{{ Carbon\Carbon::parse($reservation->tgl_masuk)->isoFormat("ddd, D MMMM Y") }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Cek-out</label>
                    <input type="text" value="{{ Carbon\Carbon::parse($reservation->tgl_keluar)->isoFormat("ddd, D MMMM Y") }}" class="form-control" disabled>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="" class="form-label">Tanggal Dibuat</label>
                    <input type="text" value="{{ Carbon\Carbon::parse($reservation->created_at)->isoFormat("ddd, D MMMM Y") }}" class="form-control" disabled>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

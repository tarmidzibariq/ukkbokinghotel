@extends('master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Reservasi</h1>
    {{-- <a href="" class="btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-folder-plus fa-sm text-white-50"></i>&nbsp; Add Data</a> --}}
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reservasi Rooms Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="row mb-4">
                <div class="col-lg-4">
                    <select name="" id="" class="form-control" id="nama_tamu">
                        <option value=""selected>pilih satu</option>
                        @foreach ($reservation as $item)
                            <option data="{{ $item->nama_tamu }}" value="{{ $item->nama_tamu }}">{{ $item->nama_tamu }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <select name="" id="" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <table class="table table-bordered" style="font-size:14px;" id="reservasi" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Tamu</th>
                        <th>Cek-in</th>
                        <th>Cek-out</th>
                        <th>Tipe Kamar</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        use App\Models\RoomTipe;
                        $a = RoomTipe::all();
                    @endphp
                    @foreach ($reservation as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-capitalize">{{ $item->nama }}</td>
                            <td class="text-capitalize">{{ $item->nama_tamu }}</td>
                            <td>{{ Carbon\Carbon::parse($item->tgl_masuk)->isoFormat("ddd, D MMMM Y") }}</td>
                            <td>{{ Carbon\Carbon::parse($item->tgl_keluar)->isoFormat("ddd, D MMMM Y") }}</td>
                            <td>{{ $item->quantity.'x '.$a->where('id',$item->id_room_tipe)->first()->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
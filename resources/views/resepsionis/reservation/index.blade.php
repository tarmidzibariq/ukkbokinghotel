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
        <form action="{{ route('reservasi.index') }}" method="get">
            @csrf
            <div class="row mb-3 mt-2">
                <div class="col-5 col-lg-5">
                    <div class="card p-1">
                        <select name="nama_tamu" class="form-control" id="select2">
                            <option value="{{  $nama ?? '' }}">{{  $nama ?? ''}}</option>
                            @foreach ($nama_tamu as $item)
                                <option value="{{ $item->nama_tamu }}">{{  $item->nama_tamu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-5 col-lg-5">
                    <input type="date" class="form-control" name="tgl" id="date" data-date-format="d-m-Y" value="{{ $tgl ?? '' }}" >
                </div>
                <div class="col-2">
                    <button class="btn btn-success  w-100"><i class="fas fa-filter"></i></button>
                </div>
            </div>
        </form>
        <div class="row mb-3">
            <div class="col-4 col-lg-2">
                <button class="btn btn-primary w-100" id="export"><i class="fas fa-print"></i> Cetak</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" style="font-size:14px;" id="reservasi" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Dibuat</th>
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
                        <tr style="font-size: 12px;">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-capitalize">{{ Carbon\Carbon::parse($item->created_at)->isoFormat("ddd, D MMMM Y") }}</td>
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


{{-- select 2 --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#select2').select2({
        placeholder: "nama tamu",
        allowClear: true
    });
</script>

{{-- export js --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('excel/java.js') }}"></script>
<script>
    // excel
    var excel = new Table2Excel();

    $('#export').click(function() {
        excel.export($('#reservasi'),'reservasi');
    });
    $(document).ready(function() {
        $('#reservasi').DataTable();
    } );
</script>



@endsection
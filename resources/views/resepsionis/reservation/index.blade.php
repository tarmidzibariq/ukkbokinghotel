@extends('master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Reservasi</h1>
    {{-- <a href="" class="btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-folder-plus fa-sm text-white-50"></i>&nbsp; Add Data</a> --}}
</div>
@php
use App\Models\RoomTipe;
$a = RoomTipe::all();

// dd($selectroom);
@endphp
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reservasi Rooms Data</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('reservasi.index') }}" method="get">
            @csrf
            <div class="row mb-3 ">
                <div class="col-12">
                    <input type="date" class="form-control" name="tgl" id="date" data-date-format="d-m-Y"
                        value="{{ $tgl ?? '' }}">
                </div>
                <div class="col-4 col-lg-3 mt-2">
                    <div class="card p-1">
                        <select name="nama_tamu" class="form-control" id="select2">
                            <option value="{{  $nama ?? '' }}">{{  $nama ?? ''}}</option>
                            @foreach ($nama_tamu as $item)
                            <option value="{{ $item->nama_tamu }}">{{  $item->nama_tamu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4 col-lg-3 mt-2">
                    <div class="card p-1">
                        <select name="id_room_tipe" class="form-control" id="select3">
                            <option value="{{  $id_room_tipe ?? '' }}">
                                {{  $a->where('id',$id_room_tipe)->first()->nama ?? ''}}</option>
                            @foreach ($roomtipe as $key)
                            <option value="{{ $key->id }}">{{ $key->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4 col-lg-3 mt-2">
                    <div class="card p-1">
                        @php
                        $caristatus = array (
                        array(0,'Cancel'),
                        array(1,'Booking'),
                        array(2,'Cek-in'),
                        array(3,'Cek-out'),
                        );
                        // dd($caristatus[0][1]);
                        @endphp
                        <select name="status" class="form-control" id="select4">
                            <option value="">Pilih satu</option>
                            <option value="0" {{ (old('status') ?? $status) == '0' ? 'selected' : '' }}>Cancel</option>
                            <option value="1" {{ (old('status') ?? $status) == '1' ? 'selected' : '' }}>Booking</option>
                            <option value="2" {{ (old('status') ?? $status) == '2' ? 'selected' : '' }}>Cek-in</option>
                            <option value="3" {{ (old('status') ?? $status) == '3' ? 'selected' : '' }}>Cek-out</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-3 mt-2">
                    <button class="btn btn-success  w-100"><i class="fas fa-filter"></i></button>
                </div>
            </div>
        </form>
        <div class="row mb-3">
            <div class="col-4 col-lg-2">
                <button class="btn btn-primary w-100" id="export"><i class="fas fa-file-excel"></i> Cetak</button>
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
                        <th>Status</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservation as $item)

                    <tr style="font-size: 12px;">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-capitalize">
                            {{ Carbon\Carbon::parse($item->created_at)->isoFormat("ddd, D MMMM Y") }}</td>
                        <td class="text-capitalize">{{ $item->nama_tamu }}</td>
                        <td>{{ Carbon\Carbon::parse($item->tgl_masuk)->isoFormat("ddd, D MMMM Y") }}</td>
                        <td>{{ Carbon\Carbon::parse($item->tgl_keluar)->isoFormat("ddd, D MMMM Y") }}</td>
                        <td>{{ $item->quantity.'x '.$a->where('id',$item->id_room_tipe)->first()->nama  }}</td>
                        <td>
                            @if ($item->status == '0')
                            <button class="btn btn-danger btn-icon-split btn-sm mt-2 mt-md-0" type="submit">
                                <span class="text">Cancel</span>
                            </button>
                            @endif
                            @if ($item->status == '1')
                            <button class="btn btn-warning btn-icon-split btn-sm mt-2 mt-md-0" data-toggle="modal"
                                data-target="#update{{$item->id}}" type="submit">
                                <span class="text">Boking</span>
                            </button>
                            <div class="modal fade" id="update{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Booking ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Ubah status menjadi Cek-in?</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('reservasi.updatebooking',$item->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="status" value="{{ $item->status }}">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($item->status == '2')
                            <button class="btn btn-info btn-icon-split btn-sm mt-2 mt-md-0" data-toggle="modal"
                                data-target="#update{{$item->id}}" type="submit">
                                <span class="text">Cek-in</span>
                            </button>
                            <div class="modal fade" id="update{{ $item->id }}" tab
                            index="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Cek-in ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Ubah status menjadi Cek-out?</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('reservasi.updatecekin',$item->id) }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden" name="status" value="{{ $item->status }}">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($item->status == '3')
                            <button class="btn btn-success btn-icon-split btn-sm mt-2 mt-md-0" data-toggle="modal"
                                data-target="#update{{$item->id}}" type="submit">
                                <span class="text">Cek-out</span>
                            </button>
                            <div class="modal fade" id="update{{ $item->id }}" tab
                            index="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Cek-out ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Ubah status menjadi Cancel?</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('reservasi.updatecekout',$item->id) }}"
                                                method="post">
                                                @csrf
                                                <input type="text" name="quantity" value="{{ $item->quantity }}">
                                                <input type="text" name="stock" value="{{ $a->where('id',$item->id_room_tipe)->first()->stock }}">
                                                <input type="text" name="id_room_tipe" value="{{ $item->id_room_tipe }}">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                                                @php
                                                    // $roomstock = RoomTipe::where('id_room_tipe',$id_room_tipe)->get();
                                                    // dd($roomstock);
                                                @endphp
                        {{-- <td>
                                <a href="{{ route('reservasi.edit',$item->id) }}"><i class="fas fa-edit "
                            style="color: #f39c12"></i></a>
                        </td> --}}
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
    $('#select3').select2({
        placeholder: "tipe kamar",
        allowClear: true
    });
    $('#select4').select2({
        placeholder: "status",
        allowClear: true
    });

</script>

{{-- export js --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('excel/java.js') }}"></script>
<script>
    // excel
    var excel = new Table2Excel();

    $('#export').click(function () {
        excel.export($('#reservasi'), 'reservasi');
    });
    $(document).ready(function () {
        $('#reservasi').DataTable();
    });

</script>



@endsection

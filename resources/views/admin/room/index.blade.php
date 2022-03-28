@extends('master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rooms</h1>
    <a href="" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i
            class="fas fa-folder-plus fa-sm text-white-50"></i>&nbsp; Add Data</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rooms Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" style="font-size:14px;" id="room" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rooms</th>
                        <th>Tipe Room</th>
                        {{-- <td>Image</td> --}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    use App\Models\RoomTipe;
                    use App\Models\Room;
                    $a = RoomTipe::all();
                @endphp
                <tbody>
                    @foreach ($room as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_kamar }}</td>
                        <td class="text-capitalize">{{ $a->where('id',$item->id_room_tipe)->first()->nama }}</td>
                        {{-- <td><img src="{{ asset('storage/rooms/'.$item->gambar) }}" alt="" width="100"></td> --}}
                        <td> 
                            {{-- kalau non aktif --}}
                            @if ($item->status == '0')
                                {{-- <form action="{{ route('room.nonactive',$item->id) }}}" method="post" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="id_room_tipe" value="{{ $item->id_room_tipe }}"> --}}
                                    <button class="btn btn-danger btn-icon-split btn-sm" type="submit">
                                        <span class="icon text-white-50">
                                           <i class="fas fa-times-circle"></i>
                                        </span>
                                        <span class="text">Non Active</span>
                                    </button>
                                {{-- </form> --}}
                                <form action="{{ route('room.active',$item->id) }}}" method="post" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="id_room_tipe" value="{{ $item->id_room_tipe }}">
                                    <button class="btn btn-secondary btn-icon-split btn-sm mt-2 mt-md-0" type="submit">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Active</span>
                                    </button>
                                </form>
                            @endif
                            {{-- jika aktif --}}
                            @if ($item->status == '1')
                                <form action="{{ route('room.nonactive',$item->id) }}}" method="post" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="id_room_tipe" value="{{ $item->id_room_tipe }}">
                                    <button class="btn btn-secondary btn-icon-split btn-sm" type="submit">
                                        <span class="icon text-white-50">
                                           <i class="fas fa-times-circle"></i>
                                        </span>
                                        <span class="text">Non Active</span>
                                    </button>
                                </form>
                                {{-- <form action="{{ route('room.active',$item->id) }}}" method="post" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="id_room_tipe" value="{{ $item->id_room_tipe }}"> --}}
                                    <button class="btn btn-success btn-icon-split btn-sm mt-2 mt-md-0" type="submit">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Active</span>
                                    </button>
                                {{-- </form> --}}
                            @endif
                        </td>
                        <td>
                            @if ($item->status == '0')
                            <div class="row justify-content-center">
                                {{-- <div class="col-2 ">
                                    <a href=""><i class="fas fa-eye " style="color: #12f325"></i></a>
                                </div> --}}
                                <div class="col-2 ">
                                    <a href=""data-toggle="modal" data-target="#edit{{$item->id}}"><i class="fas fa-edit " style="color: #f39c12"></i></a>
                                    <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('room.update',$item->id) }}"method="post">
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="" class="form-label">Kode Rooms</label>
                                                                <input type="text" class="form-control" name="kode_kamar" value="{{ $item->kode_kamar }}" readonly>
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <label for="" class="form-label">Tipe Rooms</label>
                                                                <div class="card p-1">
                                                                    <select name="id_room_tipe" id="selectedit" class="form-control " required>
                                                                        <option value="" selected>--Chose One--</option>
                                                                        <option value="{{ $item->id_room_tipe }} " selected>{{ $a->where('id',$item->id_room_tipe)->first()->nama }}</option>
                                                                        @foreach ($roomtipe as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</a>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2  ">
                                    <a href="" class="m-0" data-toggle="modal" data-target="#hapus{{ $item->id }}"><i class="fas fa-trash text-danger" ></i></a> 
                                </div>
                                <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete {{$item->kode_kamar}} ?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">You can "Delete" this permanen.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('room.destroy',$item->id) }}"method="post">
                                                @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('room.store') }}"method="post">
            @csrf
            <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">Kode Rooms</label>
                            <input type="text" class="form-control" name="kode_kamar" value="{{ 'ROSE0'.$roomkode }}" readonly>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="" class="form-label">Tipe Rooms</label>
                            <div class="card p-1">
                                <select name="id_room_tipe" id="select" class="form-control " required>
                                    <option value="" selected>--Chose One--</option>
                                    @foreach ($roomtipe as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#select').select2({
        placeholder: "Chose One",
        allowClear: true
    });
    $('#selectedit').select2({
        placeholder: "Chose One",
        allowClear: true
    });
</script>
@endsection

@extends('master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fasility Rooms</h1>
    <a href="{{ route('facility-room.create') }}" class="btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-folder-plus fa-sm text-white-50"></i>&nbsp; Add Data</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Fasility Rooms Data</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('facility-room.index') }}" method="get">
            @csrf
            <div class="row mb-3">
                <div class="col-9">
                    <div class="card p-1">
                        <select name="id_room_tipe" class="form-control" id="select2">
                            {{-- <option value="{{  $id_room_tipe ?? '' }}">{{  $roomtipe->where('id',$id_room_tipe)->first()->nama ?? ''}}</option> --}}
                            <option value=""></option>
                            @foreach ($roomtipe as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $id_room_tipe ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn btn-success  w-100"><i class="fas fa-filter"></i></button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" style="font-size:14px;" id="fasilityroom" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Rooms Tipe</th>
                        <th>Equipment</th>
                        <th>Create Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        use App\Models\RoomTipe;
                        use App\Models\FacilityRoom;
                        $a = RoomTipe::all();
                    @endphp
                    @foreach ($facilityroom as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->where('id',$item->id_room_tipe)->first()->nama ?? ''}}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat("D MMMM Y") }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-2  ">
                                        <a href="{{ route('facility-room.edit',$item->id) }}"><i class="fas fa-edit " style="color: #f39c12"></i></a>
                                    </div>
                                    <div class="col-2  ">
                                        <a href="" class="m-0" data-toggle="modal" data-target="#hapus{{ $item->id }}"><i class="fas fa-trash text-danger" ></i></a> 
                                    </div>
                                    <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete {{$item->nama_barang}} ?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">You can "Delete" this permanen.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('facility-room.destroy',$item->id) }}"method="post">
                                                    @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#select2').select2({
        placeholder: "Chose Tipe Rooms",
        allowClear: true
    });
</script>
@endsection
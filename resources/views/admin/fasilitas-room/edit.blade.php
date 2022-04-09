@extends('master')
@section('content')
<style>
    .btn-outline{
        color: rgba(0,0,0,.5);
        transition: 0.5s;
    }
    .btn-outline:hover{
        color: #4e73df;
    }
</style>
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('facility-room.index') }}" class=" "><i class="fas fa-backspace fa-sm btn-outline "></a></i>&nbsp; <span>Edit Data</span>
    </div>
    <form action="{{ route('facility-room.update',$facilityroom->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                @php
                    use App\Models\RoomTipe;
                    use App\Models\FacilityRoom;
                    $a = RoomTipe::all();
                @endphp
                <div class="col-12">
                    <label for="" class="form-label">Kode Rooms</label>
                    <div class="form-control p-1">
                        <select name="id_room_tipe" id="select" class="form-control " required>
                            {{-- <option value="" selected>--Chose One--</option> --}}
                            {{-- <option value="{{ $facilityroom->id_room_tipe }} " selected>{{ $a->where('id',$facilityroom->id_room_tipe)->first()->nama }}</option> --}}
                            @foreach ($roomtipe as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $facilityroom->id_room_tipe ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Equipment</label>
                    <input type="text" class="form-control" name="nama_barang" value="{{ $facilityroom->nama_barang }}" required>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mt-3">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm px-3">Submit</button>
            </div>
        </div>
    </form>
</div>
{{-- select2 --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#select').select2({
        placeholder: "Chose One",
        allowClear: true
    });
</script>
@endsection

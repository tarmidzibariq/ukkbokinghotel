@extends('master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-folder-plus fa-sm text-black-50"></i>&nbsp; Add Data
    </div>
    <form action="{{ route('room-tipe.update',$roomtipe->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Room Tipe</label>
                    <input type="text" class="form-control" name="nama"value="{{ $roomtipe->nama }}"  required>
                </div>
                <div class="col-lg-6 mt-2">
                    <label for="" class="form-label">Rate</label>
                    <input type="text" class="form-control" name="kapasitas" placeholder="1 person" value="{{ $roomtipe->kapasitas }}" required>
                </div>
                <div class="col-lg-6 mt-2">
                    <label for="" class="form-label">Price</label>
                    <input type="number" class="form-control" name="harga" placeholder="Rp. " value="{{ $roomtipe->harga }}" required>
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Description</label>
                    <textarea name="deskripsi" class="form-control" id="" cols="" rows="3" required>{{ $roomtipe->deskripsi }}</textarea>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mt-5">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm px-3">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection

@extends('master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-folder-plus fa-sm text-black-50"></i>&nbsp; Add Data
    </div>
    <form action="{{ route('room-tipe.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Room Tipe</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mt-5">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm px-3">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection

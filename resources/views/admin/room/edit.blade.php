@extends('master')
@section('content')
<style>
    @media (min-width: 992px) { 
        .card-gambar{
            width: 40%;
        }
    }
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
        <div class="d-flex align-items-center justify-content-between ">
            <div>
                <a href="{{ route('room.index') }}" class=" "><i class="fas fa-backspace fa-sm btn-outline "></a></i>&nbsp; <span>Add Data</span>
            </div>
            @if ($room->status == '0')
                <a href="#" type="submit" class="btn btn-danger btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-times-circle"></i>
                    </span>
                    <span class="text">Non Active</span>
                </a>
            @endif
            @if ($room->status == '1')
                <a href="#" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Active</span>
                </a>
            @endif
            
        </div>
    </div>
    
    <form action="{{ route('room.update',[$room->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <input type="hidden" class="form-control " id="id" name="id" value="" />
                <div class="col-12">
                    <label for="" class="form-label">Kode Rooms</label>
                    <input type="text" class="form-control" name="kode_kamar" value="{{ $room->kode_kamar }}" readonly>
                </div>
                <div class="col-lg-4 mt-2">
                    <label for="" class="form-label">Open Date</label>
                    <input type="date" class="form-control" name="tgl_tersedia" value="{{ $room->tgl_tersedia }}" required>
                </div>
                <div class="col-lg-4 mt-2">
                    <label for="" class="form-label">Rate</label>
                    <input type="number" class="form-control" name="kapasitas" placeholder="rate person" value="{{ $room->kapasitas }}" required>
                </div>
                <div class="col-lg-4 mt-2">
                    <label for="" class="form-label">Price</label>
                    <input type="number" class="form-control" name="harga" placeholder="Rp. " value="{{ $room->harga }}" required>
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Description</label>
                    <textarea name="deskripsi" class="form-control" id="" cols="" rows="3" required>{{ $room->deskripsi }}</textarea>
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control d-none" value="{{ $room->gambar }}" id="file">
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <div class="card card-gambar">
                    <div class="card-body p-0">
                        <img src="{{ asset('storage/rooms/'.$room->gambar) }}" alt="" class="card-img-top" id="gambar">
                        <div class="d-flex justify-content-center">
                            <p class="btn btn-sm btn-primary shadow-sm px-3 my-2" id="pilih">Upload Image</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mt-3">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm px-3">Submit</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    var tm_pilih = document.getElementById('pilih');
    var file = document.getElementById('file');
    tm_pilih.addEventListener('click', function () {
        file.click();
    })
    file.addEventListener('change', function () {
        gambar(this);
    })
    function gambar(a) {
        if (a.files && a.files[0]) {     
                var reader = new FileReader();    
                reader.onload = function (e) {
                    document.getElementById('gambar').src=e.target.result;
                }    
                reader.readAsDataURL(a.files[0]);
        }

    }
</script>
@endsection
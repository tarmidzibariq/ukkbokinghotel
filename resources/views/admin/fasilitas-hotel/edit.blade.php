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
        <a href="{{ route('facility-hotels.index') }}" class=" "><i class="fas fa-backspace fa-sm btn-outline "></a></i>&nbsp; <span>Edit Data</span>
    </div>
    <form action="{{ route('facility-hotels.update',$facilityhotel->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                
                <div class="col-12">
                    <label for="" class="form-label">Equipment</label>
                    <input type="text" name="nama_barang" class="form-control" value="{{ $facilityhotel->nama_barang }}" required>
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Total Equipment</label>
                    <input type="text" class="form-control" name="banyak_barang" value="{{ $facilityhotel->banyak_barang }}" required>
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="gambar" class="form-control d-none" id="file">
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <div class="card card-gambar">
                    <div class="card-body p-0">
                        <img src="{{ asset('upload-image/facilityhotel/'.$facilityhotel->gambar) }}" alt="" class="card-img-top" id="gambar">
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

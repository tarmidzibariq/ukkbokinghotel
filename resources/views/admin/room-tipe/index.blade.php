@extends('master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Room Tipe</h1>
    <a href="{{ route('room-tipe.create') }}" class="btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-folder-plus fa-sm text-white-50"></i>&nbsp; Add Data</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Room Tipe Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" style="font-size:14px;" id="roomtipe" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Room Tipe</th>
                        <th>Image</th>
                        <th>Ready</th>
                        <th>Price</th>
                        <th>Rate</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roomtipe as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><img src="{{ asset('storage/rooms/'.$item->gambar) }}" alt="" width="80"></td>
                            <td>@php
                                if (!empty($item->stock)) {
                                echo $item->stock;
                            }else {
                                echo '0';
                            }
                            @endphp </td>
                            <td>{{ 'Rp '.number_format($item->harga) }}</td>
                            <td>{{ $item->kapasitas }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-2  ">
                                        <a href="{{ route('room-tipe.edit',$item->id) }}"><i class="fas fa-edit " style="color: #f39c12"></i></a>
                                    </div>
                                    <div class="col-2  ">
                                        <a href="" class="m-0" data-toggle="modal" data-target="#hapus{{ $item->id }}"><i class="fas fa-trash text-danger" ></i></a> 
                                    </div>
                                    <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete {{$item->nama}} ?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">You can "Delete" this permanen.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('room-tipe.destroy',$item->id) }}"method="post">
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
@endsection
@extends('master')
@section('content')
<style>
    @media (min-width: 992px) {
        .card-gambar {
            width: 40%;
        }
    }

    .btn-outline {
        color: rgba(0, 0, 0, .5);
        transition: 0.5s;
    }

    .btn-outline:hover {
        color: #4e73df;
    }

</style>
<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between ">
            <div>
                <a href="{{ route('reservasi.index') }}" class=" "><i
                        class="fas fa-backspace fa-sm btn-outline "></a></i>&nbsp; <span>Edit Data</span>
            </div>
            @if ($reservation->status == '0')
            <a href="#" type="submit" class="btn btn-danger btn-icon-split btn-sm">
                <span class="text">Cancel</span>
            </a>
            @endif
            @if ($reservation->status == '1')
            <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                <span class="text">Booking</span>
            </a>
            @endif
            @if ($reservation->status == '2')
            <a href="#" class="btn btn-info btn-icon-split btn-sm">
                <span class="text">Cek-in</span>
            </a>
            @endif
            @if ($reservation->status == '3')
            <a href="#" class="btn btn-success btn-icon-split btn-sm">
                <span class="text">Cek-out</span>
            </a>
            @endif

        </div>
    </div>
    @php
    $caristatus = array (
    array(0,'Cancel'),
    array(1,'Booking'),
    array(2,'Cek-in'),
    array(3,'Cek-out'),
    );
    // dd($caristatus[0][1]);
    @endphp
    @php
    $select = $selectroom->where('id_room_tipe',$reservation->id_room_tipe);
    @endphp
    <form action="{{ route('reservasi.update',$reservation->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <input type="hidden" class="form-control " id="id" name="id" value="" />
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        {{-- <option value="{{ $reservation->status }}"
                        selected>{{  $caristatus[$reservation->status][1] ?? ''}}</option> --}}
                        <option value="0" {{ (old('status') ?? $reservation->status) == '0' ? 'selected' : '' }}>Cancel
                        </option>
                        <option value="1" {{ (old('status') ?? $reservation->status) == '1' ? 'selected' : '' }}>Booking
                        </option>
                        <option value="2" {{ (old('status') ?? $reservation->status) == '2' ? 'selected' : '' }}>Cek-in
                        </option>
                        <option value="3" {{ (old('status') ?? $reservation->status) == '3' ? 'selected' : '' }}>Cek-out
                        </option>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label for="" class="form-label">Pilih Kamar</label>
                    @if ($reservation->quantity == 1)
                    <div class="mt-2">
                        <select name="id_room1" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @if ($reservation->quantity == 2)
                    <div class="mt-2">
                        <select name="id_room1" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <select name="id_room2" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @if ($reservation->quantity == 3)
                    <div class="mt-2">
                        <select name="id_room1" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <select name="id_room2" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <select name="id_room3" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @if ($reservation->quantity == 4)
                    <div class="mt-2">
                        <select name="id_room1" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <select name="id_room2" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <select name="id_room3" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <select name="id_room4" class="form-control">
                            <option value="" selected>Pilih Satu</option>
                            @foreach ($select as $key)
                            <option value="{{ $key->id }}">{{ $key->kode_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mt-3">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm px-3">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection

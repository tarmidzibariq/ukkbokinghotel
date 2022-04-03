<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>Rose Hotels & Resort</title>

    <!-- style css -->
    @stack('before-style')
  {{-- style --}}
    @include('template.style')

    @stack('after-style')

    @include('template.library')


</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white border-bottom border-1 p-0 mb-5">
        <div class="container">
            <a class="navbar-brand " href="{{ route('index') }}">Rose Hotels</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#head">HOME</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#turun">ABOUT</a>
                    </li>
                    {{-- <li class="nav-item ms-2">
                        <a class="nav-link" href="#reservasi">RESERVATION</a>
                    </li> --}}
                    {{-- <li class="nav-item ms-2">
                        <a class="nav-link" href="#product">ROOMS HOTELS</a>
                    </li> --}}
                    {{-- <li class="nav-item ms-2">
                        <a class="nav-link button text-white px-3" href="{{ route('login') }}">LOGIN</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <header id="head">
        <div class="content">
            <div class="container text-center text-white">
                <h2>Welcome to</h2>
                <h1>Rose Hotels & Resort</h1>
                <div class="row mb-5">
                    <div class="d-flex justify-content-center">
                        <div class="col-8 col-md-6">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A ut architecto,
                                laboriosam tenetur quae.</p>
                        </div>
                    </div>
                </div>
                <a href="#turun" id="arw" class="text-decoration-none text-white "><i
                        class="fa-solid fa-angle-down animate-bounch" id="turun"></i></i></a>
            </div>
        </div>
        <section id="turun"></section>
    </header>
    <section id="check" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-md-10 col-12 my-4 my-lg-0">
                        {{-- <div class="d-flex align-items-center">
                            <div class="p-2 btn btn-circle" style="background-color: #fb387e;">
                                <i class="fas fa-bed text-white"></i>
                            </div>
                            <div class="ms-3 fs-5">
                                Booking Hotel Murah Online dengan Harga Promo
                            </div>
                        </div> --}}
                        
                          <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-3">
                                    <label for="">Check-in</label>
                                    <input type="text" class=" form-control rounded-0 border-1 border-white p-2 mt-1" value="{{ date('Y-m-d', strtotime('+3 days')) }}" name="tgl_masuk" id="tgl_awal" required>
                                </div>
                                <div class="col-lg-3 col-3">
                                    <label for="">Check-out</label>
                                    <input type="text" class="form-control rounded-0 border-1 border-white p-2 mt-1" value="{{ date('Y-m-d', strtotime('+4 days')) }}" id="tgl_akhir" name="tgl_keluar" required>
                                </div>
                                <div class="col-lg-2 col-3">
                                    <label for="">Tamu</label>
                                    <input type="number" class="form-control rounded-0 border-1 border-white p-2 mt-1" name="tamu" placeholder="1 person" required>
                                </div>
                                <div class="col-lg-4 col-3 mt-1">
                                    <button class="button text-center w-100 text-white mt-4 py-2">
                                        CHECK
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex justify-content-center ">
                    <div class="col-md-8 col-lg-6">
                        <h1 class="mb-4">About Me</h1>
                        <p class="mb-4">
                            Comfort and elegance come together to offer our guests a stay, that is highlighted by
                            disconnecting in a
                            wonderful environment with attention to detail.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                @foreach ($facilityhotel as $item)
                    <div class="col-lg-6 mt-lg-0 mt-3 ">
                        <div class="content ms-lg-5">
                            <img src="{{ asset('storage/facilityhotel/'.$item->gambar) }}" alt="" class="">
                            <div class="overlay">
                                <div class="text">
                                    <h3 class="text-capitalize">{{ $item->nama_barang }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-6 mt-lg-0 mt-3 ">
                    <div class="content ms-lg-5">
                        <img src="{{ asset('image/head-1.jpg') }}" alt="" class="">
                        <div class="overlay">
                            <div class="text">
                                <h3>See The Sunset</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-3">
                    <div class="content me-lg-5">
                        <img src="{{ asset('image/head-2.jpg') }}" alt="" class="">
                        <div class="overlay">
                            <div class="text">
                                <h3>See View Mountains</h3>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section id="reservasi" class="bg-light d-none">
        <div class="container pb-3">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-6">
                        <h1 class="text-center mb-3 border-bottom border-1">Reservasi</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-md-9">
                        <form action="{{ route('store') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-lg-6 col-xl-3 mt-3">
                                    <label for="">Nama Pemesanan</label>
                                    <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1" name="nama" required>
                                </div>
                                <div class="col-lg-6 col-xl-3 mt-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control rounded-0 border-1 border-white p-2  mt-1" name="email" required>
                                </div>
                                <div class="col-lg-6 col-xl-3 mt-3">
                                    <label for="">No Telp</label>
                                    <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1" name="no_telp" required>
                                </div>
                                <div class="col-lg-6 col-xl-3 mt-3">
                                    <label for="">Nama Tamu</label>
                                    <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1" name="nama_tamu" required>
                                </div>
                                <div class="col-lg-6 col-xl-3 mt-3">
                                    <label for="">Cek In</label>
                                    <input type="date" class="form-control rounded-0 border-1 border-white p-2  mt-1" name="tgl_masuk" required>
                                </div>
                                <div class="col-lg-6 col-xl-3 mt-3">
                                    <label for="">Cek Out</label>
                                    <input type="date" class="form-control rounded-0 border-1 border-white p-2  mt-1" name="tgl_keluar" required>
                                </div>
                                <div class="col-lg-6 col-xl-2 mt-3">
                                    <label for="">Tipe Kamar</label>
                                    <div class="card border-0 rounded-0  p-2 mt-1 ">
                                        <select name="id_room_tipe" id="select" class="form-control" required>
                                            <option value="" selected>--Chose One--</option>
                                            @foreach ($roomtipe as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-2 mt-3">
                                    <label for="">Jumlah Kamar</label>
                                    <input type="number" class="form-control rounded-0 border-1 border-white p-2  mt-1" name="jumlah_kamar" required>
                                </div>
                                <div class="col-lg-12 col-xl-2 mt-3">
                                    <button class="button text-center w-100 text-white mt-4" type="submit">
                                        SUBMIT
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="product" class="bg-light d-none">
        <div class="container pb-3">
            <div class="row text-center">
                <div class="d-flex justify-content-center ">
                    <div class="col-md-8 col-lg-6">
                        <h1 class="mb-4">Rooms Hotels</h1>
                        {{-- <p class="mb-5">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam velit iste reiciendis
                            soluta rem. Voluptatem quae voluptas exercitationem, cum obcaecati nulla sapiente, alias
                            sint nisi a esse natus totam. Ab?
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-md-9">
                        <div class="row">
                            @foreach ($room as $item)
                            <div class="col-lg-6  mt-3">
                                <div class="card border-0">
                                    <img src="{{ asset('storage/rooms/'.$item->gambar) }}" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <div class="row justify-content-center">
                                                <div class="col-10">
                                                    <div class="border-bottom border-1 border-dark pb-2 pt-2 text-center  text-capitalize">
                                                        <h3 class="m-0">{{ $roomtipe->where('id',$item->id_room_tipe)->first()->nama }}</h3>
                                                        <p class="fs-6 m-0 mt-1">{{ $item->kode_kamar }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="list-group text-center mt-1">
                                                {{-- @foreach ($facilityroom as $key) --}}
                                                @php
                                                   $a = $facilityroom->where('id_room',$item->id);
                                                @endphp
                                                    @foreach ($a as $key)
                                                        <li class="list-group-item border-0 p-1 text-capitalize">{{ $key->nama_barang }} </li> 
                                                        
                                                    @endforeach
                                                {{-- @endforeach --}}
                                                {{-- <li class="list-group-item border-0 p-1">Roses & Candles</li>
                                                <li class="list-group-item border-0 p-1">Grand Luxury Suite with Beach
                                                    View</li>
                                                <li class="list-group-item border-0 p-1">Exlusive Boat Trip</li> --}}
                                            </ul>
                                            <div class="d-flex justify-content-end">
                                                <button class="button mt-3">Rp {{ number_format($item->harga) }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                            {{-- <div class="col-lg-6 mt-lg-0 mt-3">
                                <div class="card border-0">
                                    <img src="{{ asset('image/product-4.jpg') }}" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <div class="row justify-content-center">
                                                <div class="col-10">
                                                    <h3
                                                        class="text-center border-bottom border-1 border-dark pb-2 pt-2">
                                                        Eucalyptus Suite</h3>
                                                </div>
                                            </div>
                                            <ul class="list-group text-center">
                                                <li class="list-group-item border-0 p-1">Everything You Need</li>
                                                <li class="list-group-item border-0 p-1">Buffet Included</li>
                                                <li class="list-group-item border-0 p-1">All Drinks and Alcoholic
                                                    Beverages
                                                </li>
                                                <li class="list-group-item border-0 p-1">Fishing Trips</li>
                                            </ul>
                                            <div class="d-flex justify-content-end">
                                                <button class="button mt-3">Rp 500.000</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Rose Hotels</h6>
                    <p class="text-justify">Offering an outdoor swimming pool and spa centre, Aston Sentul Lake Resort & Conference Center is located in Bogor, West Java. Guests can enjoy an la carte menu at the hotel's restaurant. Free Wi-Fi access and free parking are available at the property. The rooms have a flat-screen TV with cable channels, a safe and a minibar fridge. All rooms have a seating area and a private bathroom with a shower, hairdryer, slippers and free toiletries. The front desk operates 24 hours. Airport shuttle is available at a surcharge.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Privilege</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/category/front-end-development/">Unbeatable prices!/a></li>
                        <li><a href="http://scanfcode.com/category/c-language/">Staff speak Indonesian & English</a></li>
                        <li><a href="http://scanfcode.com/category/back-end-development/">Safe order</a></li>
                        <li><a href="http://scanfcode.com/category/java-programming-language/">Great location and facilities for couples</a></li>
                        <li><a href="http://scanfcode.com/category/android/">Manage your bookings online</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/about/">About Us</a></li>
                        <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                        <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                        <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                        <a href="#">Scanfcode</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    {{-- <footer>
        <div class="container pt-3 pb-2">
            <p class="text-center text-white">@2022, Rose Hotels & Resort.</p>
        </div>
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- select2 --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    {{-- datepicker --}}
    <script>
        // var awal= document.getElementById('tgl_awal');
    $( function() {
        $( "#tgl_awal" ).datepicker({                  
            minDate: moment().add('d', 3).toDate(),
            dateFormat: 'yy-mm-dd',
        });
        $( "#tgl_akhir" ).datepicker({                  
            minDate: moment().add('d', 4).toDate(),
            dateFormat: 'yy-mm-dd',
        });
    } );

    </script>
    @include('template.js')
    {{-- <script src="../js/index.js"></script> --}}
</body>

</html>
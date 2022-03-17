<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
            <a class="navbar-brand " href="#">Rose</a>
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
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#reservasi">RESERVATION</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#product">PRODUCT</a>
                    </li>
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
                    <div class="col-md-9">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-3 ">
                                    <label for="">Tanggal Check In</label>
                                    <input type="date" class=" form-control rounded-0 border-1 border-white p-2 mt-1"
                                        value="2020-04-02">
                                </div>
                                <div class="col-lg-3 mt-2 mt-md-0">
                                    <label for="">Tanggal Check Out</label>
                                    <input type="date" class="form-control rounded-0 border-1 border-white p-2 mt-1">
                                </div>
                                <div class="col-lg-2 col-5 mt-2 mt-md-0">
                                    <label for="">Jumlah Kamar</label>
                                    <input type="number" class="form-control rounded-0 border-1 border-white p-2 mt-1">
                                </div>
                                <div class="col-md-4 col-7 mt-2 mt-md-0">
                                    <button class="button text-center w-100 text-white mt-4">
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
        <div class="container pb-3">
            <div class="row text-center">
                <div class="d-flex justify-content-center ">
                    <div class="col-md-8 col-lg-6">
                        <h1 class="mb-4">About Me</h1>
                        <p class="mb-5">
                            Comfort and elegance come together to offer our guests a stay, that is highlighted by
                            disconnecting in a
                            wonderful environment with attention to detail.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-6 mt-lg-0 mt-3 ">
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
                </div>
            </div>
        </div>
    </section>

    <section id="reservasi" class="bg-light">
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
                        <div class="row">
                            <div class="col-lg-6 col-xl-3 mt-3">
                                <label for="">Nama Pemesanan</label>
                                <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-6 col-xl-3 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-6 col-xl-3 mt-3">
                                <label for="">No Telp</label>
                                <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-6 col-xl-3 mt-3">
                                <label for="">Nama Tamu</label>
                                <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-6 col-xl-3 mt-3">
                                <label for="">Cek In</label>
                                <input type="date" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-6 col-xl-3 mt-3">
                                <label for="">Cek Out</label>
                                <input type="date" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-6 col-xl-2 mt-3">
                                <label for="">Tipe Kamar</label>
                                <input type="text" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-6 col-xl-2 mt-3">
                                <label for="">Jumlah Kamar</label>
                                <input type="number" class="form-control rounded-0 border-1 border-white p-2  mt-1">
                            </div>
                            <div class="col-lg-12 col-xl-2 mt-3">
                                <button class="button text-center w-100 text-white mt-4">
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="product" class="bg-light">
        <div class="container pb-3">
            <div class="row text-center">
                <div class="d-flex justify-content-center ">
                    <div class="col-md-8 col-lg-6">
                        <h1 class="mb-4">Facility</h1>
                        <p class="mb-5">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam velit iste reiciendis
                            soluta rem. Voluptatem quae voluptas exercitationem, cum obcaecati nulla sapiente, alias
                            sint nisi a esse natus totam. Ab?
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-lg-6 mt-lg-0 mt-3">
                                <div class="card border-0">
                                    <img src="{{ asset('image/product-3.jpg') }}" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <div class="row justify-content-center">
                                                <div class="col-10">
                                                    <h3
                                                        class="text-center border-bottom border-1 border-dark pb-2 pt-2">
                                                        Harrison Suite</h3>
                                                </div>
                                            </div>
                                            <ul class="list-group text-center">
                                                <li class="list-group-item border-0 p-1">Free Champagne</li>
                                                <li class="list-group-item border-0 p-1">Roses & Candles</li>
                                                <li class="list-group-item border-0 p-1">Grand Luxury Suite with Beach
                                                    View</li>
                                                <li class="list-group-item border-0 p-1">Exlusive Boat Trip</li>
                                            </ul>
                                            <div class="d-flex justify-content-end">
                                                <button class="button mt-3">Rp 50.000</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-lg-0 mt-3">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <footer>
        <div class="container pt-3 pb-2">
            <p class="text-center text-white">@2022, Rose Hotels & Resort.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @include('template.js')
    {{-- <script src="../js/index.js"></script> --}}
</body>

</html>
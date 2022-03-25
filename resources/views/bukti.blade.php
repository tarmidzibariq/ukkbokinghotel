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
    <style>
        .transit {
            transition: 1s;
        }

    </style>
</head>

<body class="bg-light">
    <!-- <h1>Hello, world!</h1> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-1 p-0 mb-1">
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
                        {{-- <a class="nav-link" href="{{ route('index') }}">HOME</a> --}}
                    </li>
                    <li class="nav-item ms-2">
                        {{-- <a class="nav-link" href="#turun">ABOUT</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="bukti" class="mb-5">
        <div class="container">
            <div class="container ">
                <div class="row ">
                    <div class="d-flex justify-content-center ">
                        <div class="col-md-10 col-12 py-4 py-lg-0  ">
                            <div class="row py-5 px-3 bg-white shadow list-room mt-3 rounded">
                                <div class="container">
                                    <h3 class="text-center ">Download Bukti Pemesanan</h3>
                                    <div class="d-flex justify-content-center mt-4">
                                        <div class="col-lg-8">
                                            <div id="bukti-reservasi">
                                                <div class="border">
                                                    <div class="display">
                                                        <div class="header">
                                                            {{-- <img src="{{ asset('image/hotel-solid 1.png') }}" alt=""
                                                                width="70px" height="80px"> --}}
                                                            <div>
                                                                <h3>Rose</h3>
                                                                <h3>Hotels & Resort</h3>
                                                            </div>
                                                        </div>
                                                        <div class="header-room">
                                                            <h2>rosehotels.com</h2>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="header">
                                                            <h4>INVOICE</h4>
                                                        </div>
                                                        <div class="header-text">
                                                            <div class="header-text-1">
                                                                <p style="text-transform: capitalize">{{ $nama }}</p>
                                                                <p>{{ $email }}</p>
                                                                <p>{{ $no_telp }}</p>
                                                            </div>
                                                            <div class="header-text-2">
                                                                <p><b>Invoice #{{ $reservasi->id }}</b></p>
                                                                <p>{{ Carbon\Carbon::parse($created_at)->isoFormat("ddd, D MMMM Y") }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="border">
                                                            <div class="text">
                                                                <div class="col">
                                                                    <p>Nama Tamu</p>
                                                                    <p>{{ $nama_tamu }}</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Jumlah Tamu</p>
                                                                    <p>{{ $tamu.' orang' }}</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Check-in</p>
                                                                    <p>{{ Carbon\Carbon::parse($tgl_masuk)->isoFormat("ddd, D MMMM Y") }}
                                                                    </p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Check-out</p>
                                                                    <p>{{ Carbon\Carbon::parse($tgl_keluar)->isoFormat("ddd, D MMMM Y") }}
                                                                    </p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Tipe Kamar</p>
                                                                    <p>{{ $roomtipe->nama }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="total">
                                                                <div style="width: 50%">
                                                                </div>
                                                                <div class="text">
                                                                    <p>Harga Kamar</p>
                                                                    <p>Jumlah Dipesan</p>
                                                                    <p>Total</p>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{{ 'IDR '. number_format($roomtipe->harga) }}</p>
                                                                    <p>{{ $quantity }}</p>
                                                                    <p><b>{{ 'IDR '.number_format($total) }}</b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('buktireservasi',$roomtipe->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $nama }}" name="nama">
                                    <input type="hidden" value="{{ $email }}" name="email">
                                    <input type="hidden" value="{{ $no_telp }}" name="no_telp">
                                    <input type="hidden" value="{{ $nama_tamu }}" name="nama_tamu">
                                    <input type="hidden" value="{{ $tamu }}" name="tamu">
                                    <input type="hidden" value="{{ $tgl_masuk }}" name="tgl_masuk">
                                    <input type="hidden" value="{{ $tgl_keluar }}" name="tgl_keluar">
                                    <input type="hidden" value="{{ $quantity }}" name="quantity">
                                    <input type="hidden" value="{{ $total }}" name="total">
                                    <input type="hidden" value="{{ $id_room_tipe }}" name="id_room_tipe">
                                    <input type="hidden" value="{{ $created_at }}" name="created_at">
                                    <div class="text-center" style="margin-top: 50px">
                                        <button class="btn btn-primary text-white">Download Bukti Disini</button>
                                    </div>
                                </form>
                            </div>
                            
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
                    <h6>About</h6>
                    <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative to help the
                        upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or
                        snippets as the code wants to be simple. We will help programmers build up concepts in different
                        programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android,
                        SQL and Algorithm.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                        <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                        <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                        <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                        <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                        <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
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
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
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
    {{-- @include('template.js') --}}
    {{-- <script src="../js/index.js"></script> --}}

</body>

</html>

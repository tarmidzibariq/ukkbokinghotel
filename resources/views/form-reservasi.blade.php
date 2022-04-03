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
    <section id="form-reservasi">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-center ">
                        <div class="col-md-10 col-12 py-4   ">
                            <form action="{{ route('check',$roomtipe->id) }}" method="post">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-lg-7">
                                        <div class="card border-0 shadow" style="border-radius: 10px;">
                                            <div class="card-body p-4">
                                                <div class="card-title">
                                                    <h4 class="mb-4" style="color: #4a4a4a">Detail Pemesan</h4>
                                                </div>
                                                <div class="form-floating mb-3 ">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="name@example.com"  style="height:45px;" name="nama" required>
                                                    <label for="floatingInput" class=""
                                                        style="font-size: 14px; padding-top: 10px; color:#8a93a7;">Nama</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="name@example.com" style="height:45px;" name="no_telp" required>
                                                    <label for="floatingInput" class=""
                                                        style="font-size: 14px; padding-top: 10px; color:#8a93a7;">Nomor
                                                        Telepon</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingInput"
                                                        placeholder="name@example.com" style="height:45px;" name="email" required>
                                                    <label for="floatingInput" class=""
                                                        style="font-size: 14px; padding-top: 10px; color:#8a93a7;">Alamat
                                                        Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 shadow mt-3" style="border-radius: 10px;">
                                            <div class="card-body p-4">
                                                <div class="card-title">
                                                    <h4 class="mb-4" style="color: #4a4a4a">Detail Tamu</h4>
                                                </div>
                                                <div class="alert alert-danger" style="height: 45px; padding-top: 10px">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="p-0" style="font-size: 14px; color: #a1a1a1">Sama Seperti
                                                            di Pemesan</p>
                                                        <p  style="background-color: #f03506; border-radius: 5px; font-size: 12px;" id="tombol" class=" text-white p-1 px-3">Klik</p>
                                                        {{-- <div class="form-check form-switch p-0">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="tombol">
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="form-floating mb-3 ">
                                                    <input type="text" class="form-control" placeholder="name@example.com"
                                                        style="height:45px;" id="hasil" name="nama_tamu" required>
                                                    <label for="floatingInput" class=""
                                                        style="font-size: 14px; padding-top: 10px; color:#8a93a7;">Nama
                                                        Tamu</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-3 mt-lg-0">
                                        <div class="card border-0 shadow" style="border-radius: 10px;">
                                            <div class="card-body p-4">
                                                <div class="card-title">
                                                    <h4 class="mb-4" style="color: #4a4a4a">Detail Pemesanan</h4>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body detail-pemesanan">
                                                        <div class="row align-items-center">
                                                            <div class="col-4">
                                                                <div style="background-image: url({{ asset('storage/rooms/'.$roomtipe->gambar) }}); " class="gambar"></div>
                                                            </div>
                                                            <div class="col-8">
                                                                <h5 style="font-size: 16px; color:#4a4a4a; font-weight:500;" class="mb-1 text-capitalize">{{ $roomtipe->nama }} </h5>
                                                                <p style="font-size: 12px; color: #8a93a7;" class="m-0">{{ $tamu.' Tamu' }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mt-4" style="color: #8a93a7; font-size:14px;" >
                                                            <p class="m-0">Jumlah Kamar</p>
                                                            <p class="m-0">{{ $quantity.' Kamar' }}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mt-2" style="color: #8a93a7; font-size:14px;" >
                                                            <p class="m-0">Harga Kamar</p>
                                                            <p class="m-0">{{ 'IDR '. number_format($roomtipe->harga) }}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mt-2" style="color: #8a93a7; font-size:14px;" >
                                                            <p class="m-0">Check-in</p>
                                                            <p class="m-0">{{ Carbon\Carbon::parse($tgl_masuk)->isoFormat("ddd, D MMMM Y") }}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mt-2" style="color: #8a93a7; font-size:14px;">
                                                            <p class="m-0">Check-out</p>
                                                            <p class="m-0">{{ Carbon\Carbon::parse($tgl_keluar)->isoFormat("ddd, D MMMM Y") }}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mt-4 border-top" style="color: #8a93a7; font-size:16px;">
                                                            <p class="mt-3 mb-0">Total</p>
                                                            @php
                                                                $total= $roomtipe->harga * $quantity;
                                                                // print_r($total);
                                                                @endphp
                                                            <p class="mt-3 mb-0 text-primary">IDR {{ number_format($total) }}</p>
                                                        </div>
                                                        <input type="hidden" value="{{ $tgl_masuk }}" name="tgl_masuk">
                                                        <input type="hidden" value="{{ $roomtipe->stock }}" name="stock">
                                                        <input type="hidden" value="{{ $tgl_keluar }}" name="tgl_keluar">
                                                        <input type="hidden" value="{{ $roomtipe->id }}" name="id_room_tipe">
                                                        <input type="hidden" value="{{ $quantity }}" name="quantity">
                                                        <input type="hidden" value="{{ $tamu }}" name="tamu">
                                                        <input type="hidden" value="{{ $total }}" name="total">
                                                        <input type="hidden" value="{{ date('Y-m-d') }}" name="created_at">
                                                        <input type="hidden" value="1" name="status">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" type="button" class="btn btn-success w-100 mt-3" data-bs-toggle="modal" data-bs-target="#input" style="border-radius: 10px;"  >
                                            Boking Now
                                        </a>
                                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Launch demo modal
                                        </button> --}}
                                        {{-- modal pesanan --}}
                                    </div>
                                </div>
                                <div class="modal fade" id="input" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header border-0">
                                            {{-- <h5 class="modal-title text-secondary fw-normal" id="exampleModalLabel">Reservasi</h5> --}}
                                            <a href="" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                                        </div>
                                        <div class="modal-body text-center fw-bold py-4">
                                            <h3 class="text-secondary">Yakin Simpan Data ini?</h3>
                                        </div>
                                        <div class="modal-footer border-0 justify-content-center">
                                            <a href="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    {{-- @include('template.js') --}}
    {{-- <script src="../js/index.js"></script> --}}
    {{-- sama dengan yang dipemesan --}}
    <script>
        let a = document.getElementById("tombol");
        a.addEventListener("click", () => {
            var nilai_form = document.getElementById("floatingInput").value;
            document.getElementById("hasil").value = nilai_form;
        });

    </script>
    <script>
        window.onscroll = function () {
            myFunction()
        };

        var widget = document.getElementById('scroll');
        var sticky = widget.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                widget.classList.add("fixed-top", "container", "col-md-9", "transit")
            } else {
                widget.classList.remove("fixed-top", "container", "col-md-9", "transit");
            }
        }

    </script>
    {{-- plus minus input number --}}
    <script>
        function incrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal)) {
                parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        function decrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal) && currentVal > 0) {
                parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        $('.inputgrup').on('click', '.button-plus', function (e) {
            incrementValue(e);
        });

        $('.inputgrup').on('click', '.button-minus', function (e) {
            decrementValue(e);
        });

    </script>
</body>

</html>

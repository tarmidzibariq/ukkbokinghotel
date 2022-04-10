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
    <section id="forminput">
        <div class="container">
            <div class="container ">
                <div class="row ">
                    <div class="d-flex justify-content-center ">
                        <div class="col-md-10 col-12 py-4 py-lg-0  ">

                            <form action="{{ route('store') }}" method="post">
                                @csrf
                                <div id="scroll">
                                    <div class="row bg-white py-3 px-3 rounded-top shadow ">
                                        <div class="col-lg-3 col-4">
                                            <label for="">Check-in</label>
                                            <input type="text" class=" form-control rounded-0 border-1 border-white p-2 mt-1 bg-light"value="{{ $tgl_masuk ?? date('Y-m-d', strtotime('+3 days')) }}" id="datepicker" name="tgl_masuk" >
                                        </div>
                                        <div class="col-lg-3 col-4">
                                            <label for="">Check-out</label>
                                            <input type="text" class="form-control rounded-0 border-1 border-white p-2 mt-1 bg-light" value="{{ $tgl_keluar ?? date('Y-m-d', strtotime('+4 days')) }}" id="dateenamhari" name="tgl_keluar">
                                        </div>
                                        <div class="col-lg-2 col-4">
                                            <label for="">Tamu</label>
                                            <input type="number"
                                                class="form-control rounded-0 border-1 border-white p-2 mt-1 bg-light"
                                                name="tamu"value="{{ $tamu}}">
                                        </div>
                                        <div class="col-lg-4 col-12 mt-1">
                                            <button class="button text-center w-100 text-white mt-4 py-lg-2">
                                                CHECK
                                            </button>
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
    <section id="hotels" class=" mb-5 ">
        <div class="container">
            <div class="container ">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-md-10 col-12 rounded">
                            
                            @foreach ($roomtipe as $item)
                                @if ($item->stock > 0)
                                    <div class="row py-3 px-3 bg-white shadow list-room mt-3 rounded">
                                    <div class="col-12 col-lg-4">
                                        <img src="{{ asset('upload-image/rooms/'.$item->gambar) }}" alt="" class=" rounded">
                                    </div>
                                    <div class="col-12 col-lg-8 mt-3 mt-lg-0">
                                        <div class="title">
                                            <div class="d-flex justify-content-between border-bottom align-items-center">
                                                <div>
                                                    <h4 class="mb-1 text-capitalize">{{ $item->nama }}</h4>
                                                    <p class=" mb-1 " style=" color: #8f8f8f;">{{'*Tersedia '.$item->stock  }}</p>
                                                </div>
                                                <div>
                                                    <p class="m-0 text-danger text-end text-capitalize">{{ $item->deskripsi }}</p>
                                                    <h6 class="m-0 mt-1 text-end" style="color: #212529;">{{ 'IDR. '.number_format($item->harga) }}</h6>

                                                </div>
                                                {{-- <div class="d-flex justify-content-end">
                                                </div> --}}
                                            </div>
                                            <div class="row mt-3">
                                                @php
                                                    $a = $facilityroom->where('id_room_tipe',$item->id);
                                                    // dd($a);
                                                @endphp
                                                <div class="col-6">
                                                    
                                                <p class="text-capitalize m-0"><i class="fas fa-bed"></i>&nbsp;  {{ $item->kapasitas}}</p>
                                                </div>
                                                @foreach ($a as $key)
                                                <div class="col-6">
                                                    <p class="text-capitalize m-0"><i class="fa-solid fa-check"></i>  {{ $key->nama_barang }}</p>
                                                </div>
                                                    
                                                @endforeach
                                                {{-- <div class="col-6">
                                                    <p>- Wifi</p>
                                                </div> --}}
                                            </div>
                                            
                                            <div class="row mt-2">
                                                <form action="{{ route('storeup',$item->id) }}" method="post">
                                                @csrf
                                                    <div class="d-flex justify-content-lg-end">
                                                        <div class="col-6 col-lg-3 me-3">
                                                            <div class="d-flex justify-content-between inputgrup">
                                                                <input type="button" value="-" class="button-minus btn btn-danger"
                                                                    data-field="quantity">
                                                                <input type="number" step="1" min="1" max="{{ $item->stock }}" value="0" name="quantity"
                                                                    class="quantity-field">
                                                                <input type="button" value="+" class="button-plus btn btn-success"
                                                                    data-field="quantity">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" value="{{ $tgl_masuk }}" name="tgl_masuk">
                                                        <input type="hidden" value="{{ $tgl_keluar }}" name="tgl_keluar">
                                                        <input type="hidden" value="{{ $tamu }}" name="tamu">
                                                        <div class="col-6 col-lg-3">
                                                            <button class="btn btn-primary text-center w-100 text-white "
                                                                type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                            @endforeach
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
    {{-- @include('template.js') --}}
    {{-- <script src="../js/index.js"></script> --}}

    {{-- datepicker --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({                  
            minDate: moment().add('d', 3).toDate(),
            dateFormat: 'yy-mm-dd',
        });
    } );
    $( function() {
        $( "#dateenamhari" ).datepicker({                  
            minDate: moment().add('d', 4).toDate(),
            dateFormat: 'yy-mm-dd',
        });
    } );
    </script>
    <script>
        window.onscroll = function () {
            myFunction()
        };

        var widget = document.getElementById('scroll');
        var sticky = widget.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                widget.classList.add("fixed-top", "container", "col-md-9","transit")
            } else {
                widget.classList.remove("fixed-top", "container", "col-md-9","transit");
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

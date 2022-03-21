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
            <a class="navbar-brand " href="#">Rose Hotels</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="{{ route('index') }}">HOME</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#turun">ABOUT</a>
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
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="card border-0 shadow">
                                        <div class="card-body p-4">
                                            <div class="card-title">
                                                <h4 class="mb-4" style="color: #4a4a4a">Detail Pemesan</h4>
                                            </div>
                                            <div class="form-floating mb-3 ">
                                                <input type="text" class="form-control" id="floatingInput"
                                                     placeholder="name@example.com"  style="height:45px;" >
                                                <label for="floatingInput" class=""
                                                    style="font-size: 14px; padding-top: 10px; color:#636363;">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" style="height:45px;">
                                                <label for="floatingInput" class=""
                                                    style="font-size: 14px; padding-top: 10px; color:#636363;">Nomor
                                                    Telepon</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" style="height:45px;">
                                                <label for="floatingInput" class=""
                                                    style="font-size: 14px; padding-top: 10px; color:#636363;">Alamat
                                                    Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-0 shadow mt-4">
                                        <div class="card-body p-4">
                                            <div class="card-title">
                                                <h4 class="mb-4" style="color: #4a4a4a">Detail Tamu</h4>
                                            </div>
                                            <div class="alert alert-secondary" style="height: 45px; padding-top: 10px">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="p-0" style="font-size: 14px; color: #4a4a4a">Sama Seperti
                                                        di Pemesan</p>
                                                    <p  style="background-color: #0d6efd; border-radius: 5px; font-size: 12px;" id="tombol" class=" text-white p-1">Klik</p>
                                                    {{-- <div class="form-check form-switch p-0">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="tombol">
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3 ">
                                                <input type="text" class="form-control" placeholder="name@example.com"
                                                    style="height:45px;" id="hasil">
                                                <label for="floatingInput" class=""
                                                    style="font-size: 14px; padding-top: 10px; color:#636363;">Nama
                                                    Tamu</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 ">
                                    <div class="card">
                                        <div class="card-body">
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

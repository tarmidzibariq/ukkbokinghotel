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

    @include('template.style')

    @stack('after-style')

    @include('template.library')
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-1 p-0 ">
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
                    {{-- <li class="nav-item ms-2">
                        <a class="nav-link" href="#turun">ABOUT</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#reservasi">RESERVATION</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#product">PRODUCT</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <header id="head">
        <div class="content">
            <div class="container">
                <!-- <h2>Welcome to</h2> -->
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="text-start text-white">Rose Hotels & Resort</h1>
                        <div class="row text-white">
                            <div class="d-flex justify-content-start">
                                <div class="col-10 ">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A ut architecto,
                                        laboriosam tenetur quae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('register') }}" method="post">
                        @csrf
                            <div class="card ms-auto border-0 bg-light shadow-lg ">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="mb-1">REGISTER</h3>
                                        <p class="">Createad your account.</p>
                                    </div>
                                    <div class="form-login mt-4">
                                        <input type="text" class="form-control p-2 @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="email" class="form-control mt-3 p-2 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="password" class="form-control mt-3 p-2 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password" >
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="password" id="password-confirm" class="form-control mt-3 p-2" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="row choice mt-5">
                                        <div class="d-flex align-items-center">
                                            <div class="col-6">
                                                <a href="{{ route('login') }}">Sudah punya akun?</a>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="col-6 ">
                                                    <button class="" type="submit">REGISTER</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <a href="#turun" id="arw" class="text-decoration-none text-white "><i
                        class="fa-solid fa-angle-down animate-bounch" id="turun"></i></i></a> -->
            </div>
        </div>
        <section id="turun"></section>
    </header>

    <footer>
        <div class="container pt-3 pb-2">
            <p class="text-center text-white">@2022, Rose Hotels & Resort.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @include('template.js')
</body>

</html>
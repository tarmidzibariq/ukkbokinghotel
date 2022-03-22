<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    {{-- select2 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    <title>Rose Hotels & Resort</title>

    <!-- style css -->
    <style>
        #bukti-reservasi {
            font-family: 'Assistant', sans-serif;
            width: 50%;
            margin: 10px;
        }

        #bukti-reservasi .border {
            border: 2px solid black;
            padding: 20px 40px;
        }

        #bukti-reservasi .border .display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #4a4a4a;
        }

        #bukti-reservasi .border .header {
            display: flex;
            align-content: center;
        }

        #bukti-reservasi .border .header img {
            margin-right: 15px;
            color: #fb387e !important;
        }

        #bukti-reservasi .border .header h3 {
            font-family: 'Lobster',
                cursive;
            font-size: 30px;
            font-weight: normal;
            margin: 0px;
            color: #fb387e !important;
        }

        #bukti-reservasi .border .header-room h2 {
            font-size: 20px;
            margin: 10px 0;
            font-weight: 400;
        }

        #bukti-reservasi .border .content {
            width: 100%;
            color: #2c2c2c;
        }

        #bukti-reservasi .border .content .header {
            display: flex;
            justify-content: center;

        }

        #bukti-reservasi .border .content .header h4 {
            font-size: 25px;
            font-weight: 400;
            margin: 20px 0;
            color: #000;
        }

        #bukti-reservasi .border .content .header-text {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #bukti-reservasi .border .content .header-text p {
            margin: 5px 0;
        }

        #bukti-reservasi .border .content .header-text .header-text-2 {
            text-align: right;
        }

        #bukti-reservasi .border .content .border {
            margin-top: 10px;
            border-radius: 10px;
            border: 2px solid #4a4a4a;
            padding: 20px 40px;
        }

        #bukti-reservasi .border .content .border .text .col {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px dashed #4a4a4a;
        }

        #bukti-reservasi .border .content .border .text .col p {
            margin: 15px 0 10px;
        }

        #bukti-reservasi .border .content .border .total {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        #bukti-reservasi .border .content .border .total .text p {
            margin: 10px 0;
        }

        #bukti-reservasi .border .content .border .total .text:first-child {
            text-align: left;
        }

        #bukti-reservasi .border .content .border .total .text:last-child {
            text-align: right;
        }

    </style>
    {{-- @stack('before-style')
    @include('template.style')

    @stack('after-style') --}}

    @include('template.library')
    <style>
        .transit {
            transition: 1s;
        }

    </style>
</head>

<body class="bg-white">

    <section id="bukti-reservasi">
        <div class="border">
            <div class="display">
                <div class="header">
                    <img src="{{ asset('image/hotel-solid 1.png') }}" alt="" width="70px" height="80px">
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
                        <p>Muhammad Tarmidzi Bariq</p>
                        <p>tarmidzibariq@gmail.com</p>
                        <p>6281220745317</p>
                    </div>
                    <div class="header-text-2">
                        <p><b>Invoice #123</b></p>
                        <p>Rab, 5 Maret 2022</p>
                    </div>
                </div>
                <div class="border">
                    <div class="text">
                        <div class="col">
                            <p>Nama Tamu</p>
                            <p>Muhammad Tarmidzi Bariq</p>
                        </div>
                        <div class="col">
                            <p>Jumlah Tamu</p>
                            <p>1 orang</p>
                        </div>
                        <div class="col">
                            <p>Check-in</p>
                            <p>Rab, 5 Maret 2022</p>
                        </div>
                        <div class="col">
                            <p>Check-out</p>
                            <p>Kam, 6 Maret 2022</p>
                        </div>
                        <div class="col">
                            <p>Tipe Kamar</p>
                            <p>Deluxe</p>
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
                            <p>IDR 350.000</p>
                            <p>1</p>
                            <p><b>IDR 350.000</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
</body>

</html>

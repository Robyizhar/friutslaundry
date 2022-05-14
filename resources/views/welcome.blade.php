{{-- @extends('layouts.main')
@section('content')
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-2">
        @php
            $account = [
                'email' => 'owner@fruitslaundry.com',
                'password' => 'admin1234'
            ];
            $accounts = json_encode($account);
        @endphp
        {!! QrCode::size(500)->generate($accounts); !!}
        <p>Scan me to return to the original page.</p>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="default-src *; img-src * 'self' data: https:; script-src 'self' 'unsafe-inline' 'unsafe-eval' *; style-src  'self' 'unsafe-inline' *">
    <meta http-equiv="Content-Security-Policy" content="default-src * gap:; script-src * 'unsafe-inline' 'unsafe-eval'; connect-src *; img-src * data: blob: android-webview-video-poster:; style-src * 'unsafe-inline';">
    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .form-process {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 3;
            background-color: transparent;
            width: 100%;
            height: 100%;
            background: center center no-repeat #ffffffa8;
        }

        .css3-spinner {
            position: absolute;
            z-index: auto;
            background-color: transparent;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            text-align: center;
            background-color: #ffffff40;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-perspective: 1000;
        }
        .lds-ring, .lds-ring div {
            box-sizing: border-box;
        }
        .lds-ring {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            top: 50%;
        }
        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 64px;
            height: 64px;
            margin: 8px;
            border: 8px solid currentColor;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: currentColor transparent transparent transparent;
        }
        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }
        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }
        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }
        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>

    <div class="form-process" style="display: none;">
        <div class="css3-spinner">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            {{-- <img src="../assets/images/logo-dark.png" alt="" height="22"> --}}
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            {{-- <img src="../assets/images/logo-light.png" alt="" height="22"> --}}
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="text-center">
                                <div class="mt-4">
                                    <div style="width: 500px; display: none;" id="reader"></div>
                                </div>
                                <h3>Selamat datang !</h3>
                                <p class="text-muted"> Silahkan login dengan QR Code atau <a href="{{ route('login') }}">login dengan email</a>. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js-->
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ asset('assets/js/scan-qr-code.js')}}"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            $('.form-process').css('display', 'block');
            $.ajax({
                type: "POST",
                url: `{!! route('login-qr') !!}`,
                data: {
                    user: decodedText
                },
                success: function (response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    if (response == 'false') {
                        $('.form-process').css('display', 'none');
                        Toast.fire({
                            icon: 'error',
                            title: 'Data user tidak user tidak ditemukan.'
                        });
                    } else {
                        $('.form-process').css('display', 'none');
                        Toast.fire({
                            icon: 'success',
                            title: 'Data user berhail ditemukan.'
                        });
                        let url = `{!! route('home') !!}`;
                        location.href = url;
                    }
                }
            });
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 500 }
        );
        html5QrcodeScanner.render(onScanSuccess);

        $(document).ready(function () {
            $('#reader').css("display", "block");
            $('#reader').css("width", "auto");
            $('#reader').css("border", "none");
            $('#reader__scan_region').html('<br> <i class="fas fa-qrcode fa-10x"></i>');
            $('#reader__dashboard_section_swaplink').css("display", "none");
        });

    </script>
</body>
</html>

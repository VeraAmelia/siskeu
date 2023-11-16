<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Login || SISKEU Mardira</title>
    <meta charset="UTF-8">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('Logiin/logoo.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- TOASTR --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('Logiin/bootstrap.min.css') }}"> --}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Logiin/font-awesome.min.css') }}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Logiin/main.css') }}">
    <!--===============================================================================================-->

</head>

<style>
    @keyframes moveUpDown {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
            /* Ubah nilai sesuai preferensi Anda */
        }
    }

    .moving-img {
        animation: moveUpDown 2s ease-in-out infinite;
        /* Ubah durasi dan easing sesuai preferensi Anda */
    }

    .password-input-container {
        position: relative;
    }

    .password-toggle-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{ route('reset.password.post') }}" method="POST" class="login100-form validate-form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <span class="login100-form-title p-b-43">
                        <img src="{{ asset('Logiin/logoo.png') }}" class="moving-img" width="30%"
                            style="vertical-align: middle;">
                        <br><br>
                        Halaman Login Siskeu <br>
                        <p style="color: white; margin-top: 16px; font-size: 18px; color: white; font-weight: 800"
                            id="animated-text"> Haha</p>
                        <p
                            style="color: white; margin-top: 16px; font-size: 18px; background: black; color: white; border-radius: 10px">
                            Silahkan Login</p>
                    </span>

                   

                    <div style="display:block;height:35px;">
                        <div id="info" style="display:none;"></div>
                    </div>

                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" placeholder="Masukan Email"
                            autocomplete="off">
                        <span class="focus-input100"></span>
                    </div>

                    @if ($errors->has('password'))
                        <span class="text-danger" style="color: white">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="wrap-input100 validate-input">
                        <input id="password-input" class="input100" type="password" name="password"
                            placeholder="Masukan password" autocomplete="off">
                        <span class="password-toggle-icon" onclick="togglePasswordVisibility()">
                            <i id="eye-icon" class="fas fa-eye"></i>
                        </span>
                    </div>


                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    <div class="wrap-input100 validate-input">
                        <input id="password_confirmation" class="input100" type="password" name="password_confirmation"
                            placeholder="Masukan password" autocomplete="off">
                        <span class="password-toggle-icon" onclick="togglePasswordVisibility()">
                            <i id="eye-icon" class="fas fa-eye"></i>
                        </span>
                    </div>




                    <div class="container-login100-form-btn" style="margin-top: 10px">
                        <button class="login100-form-btn" type="submit" id="login">
                            Login
                        </button>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('Logiin/keuangan.jpg')"></div>
            </div>
        </div>
    </div>
    </div>


    <!--===============================================================================================-->
    <script src="{{ asset('Logiin/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    {{-- <script src="{{ asset('Logiin/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('Logiin/bootstrap.min.js') }}"></script> --}}
    <!--===============================================================================================-->
    <script src="{{ asset('Logiin/login.js') }}"></script>
    {{-- TOASTR --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- TOASTR --}}
    @if (Session::has('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.warning("{{ Session::get('error') }}", 'Login Gagal 🙏', {
                timeout: 12000
            });
        </script>
    @endif
    {{-- TOASTR --}}

    {{-- TOASTR GANTI PASSWORD --}}
    @if (Session::has('ganti'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('ganti') }}", 'Berhasil !', {
                timeout: 13000
            });
        </script>
    @endif
    {{-- END TOASTR GANTI PASSWORD --}}

    {{-- TOASTR GANTI PASSWORD --}}
    @if (Session::has('kosong'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('kosong') }}", 'Gagal !', {
                timeout: 13000
            });
        </script>
    @endif
    {{-- END TOASTR GANTI PASSWORD --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const animatedText = document.getElementById("animated-text");
            const initialText = "-";
            const text = " STMIK Mardira Indonesia -";

            function animateText() {
                let currentIndex = 0;
                animatedText.textContent = initialText; // Menampilkan initialText saat halaman dimuat

                setInterval(function() {
                    if (currentIndex < text.length) {
                        animatedText.textContent += text[currentIndex];
                        currentIndex++;
                    } else {
                        animatedText.textContent =
                            initialText; // Mengatur ulang teks ke initialText saat animasi selesai
                        currentIndex = 0;
                    }
                }, 150); // Mengatur kecepatan animasi (ms)
            }

            animateText();
        });
    </script>



</body>

</html>

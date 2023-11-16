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
                <form action="{{ route('postlogin') }}" method="post" class="login100-form validate-form">
                    {{ csrf_field() }}
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

                    @if (Session::has('kosong'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('kosong') }}
                        </div>
                    @endif

                    <div style="display:block;height:35px;">
                        <div id="info" style="display:none;"></div>
                    </div>

                    {{-- @if ($errors->has('email'))
                        <span class="help-block" style="color: white">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" placeholder="Masukan Email"
                            autocomplete="off">
                        <span class="focus-input100"></span>
                    </div> --}}
                    @if ($errors->has('name'))
                        <span class="help-block" style="color: white">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="name" placeholder="Masukan Nama"
                            autocomplete="off">
                        <span class="focus-input100"></span>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block" style="color: white">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="wrap-input100 validate-input">
                        <input id="password-input" class="input100" type="password" name="password"
                            placeholder="Masukan password" autocomplete="off">
                        <span class="password-toggle-icon" onclick="togglePasswordVisibility()">
                            <i id="eye-icon" class="fas fa-eye"></i>
                        </span>
                    </div>

                    <!-- <div class="row col-sm-12">
                        <div class="wrap-input100 validate-input" style="width:50%; ">
                            <input class="input100" type="text" name="captcha" placeholder="Kode Verifikasi">
                        </div>

                        <div class="" style="margin-left: 6px; margin-top: 6px">
                            <div class="captcha">
                                <span>{!! captcha_img('flat') !!}</span>

                                <button type="button" style="background: black; border: none"
                                    class="btn btn-success btn-refresh">
                                    <i class="fa fa-refresh rotate"></i>
                                </button>
                            </div>

                        </div>

                        <style>
                            /* Menambahkan animasi putaran */
                            .rotate {
                                animation: spin 2s linear infinite;
                            }

                            /* Definisikan animasi putaran */
                            @keyframes spin {
                                0% {
                                    transform: rotate(0deg);
                                }

                                100% {
                                    transform: rotate(360deg);
                                }
                            }
                        </style>

                    </div> -->
                    <!-- @if ($errors->has('captcha'))
                        <label class="help-block" style="color: white">
                            <strong>{{ $errors->first('captcha') }}</strong>
                        </label> <br>
                    @endif -->

                    <div class="form-group row">
                        <div class="col-md-6 ">
                            <label class="form-check-label">
                                <a href="{{ route('forget.password.get') }}"
                                    style="font-size: 17px; color: white; font-weight: 600">Lupa Password?</a>
                            </label>
                        </div>
                        <div class="col-md-6 text-right">
                            <!-- Menambahkan kelas "text-right" untuk menggeser elemen ke kanan -->
                            {{-- <div class="form-check">
                                <input style="margin-left: -108px" class="form-check-input" type="checkbox"
                                    name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember"
                                    style="font-size: 17px; color: white; font-family: Poppins-Regular; font-weight: 600">
                                    Ingat Saya !
                                </label>
                            </div> --}}
                        </div>
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

    <script>
        var passwordInput = document.querySelector('input[name="password"]');
        var eyeIcon = document.getElementById('eye-icon');

        function togglePasswordVisibility() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
                passwordInput.style.paddingRight = '35px'; // Tambahkan padding saat ikon mata ditampilkan
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
                passwordInput.style.paddingRight = '10px'; // Kembalikan padding normal
            }
        }
    </script>


</body>

</html>

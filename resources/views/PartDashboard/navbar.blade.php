<style>
    .title-word {
    animation: color-animation 4s linear infinite !important;
  }
  
  .title-word-1 {
    --color-1: orange !important;
    --color-2: yellow !important;
    --color-3: white !important;
  }

  
  @keyframes color-animation {
    0%    {color: var(--color-1)}
    32%   {color: var(--color-1)}
    33%   {color: var(--color-2)}
    65%   {color: var(--color-2)}
    66%   {color: var(--color-3)}
    99%   {color: var(--color-3)}
    100%  {color: var(--color-1)}
  }

  @keyframes moveLeftRight {
        0% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(50%); /* Jarak pergerakan ke kanan */
        }
        100% {
            transform: translateX(0);
        }
    }

    .moving-img {
        animation: moveLeftRight 4s ease-in-out infinite; /* Ubah durasi dan easing sesuai preferensi Anda */
    }
    @keyframes moveUpDown {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px); /* Atur nilai sesuai dengan jarak vertikal yang diinginkan */
        }
    }

    .moving-text {
        animation: moveUpDown 2s infinite; /* Atur durasi animasi dan pengulangan */
    }

</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
{{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light " style="position: fixed; width: 84%; height: 6%"> --}}
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="{{ url('#') }}" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            {{-- <span style="color: orange; font-weight: 700" class="nav-link title-word-1  ">Lembaga STMIK Mardira</span> --}}
            <span style=
            "color: orange; font-weight: 700" class="nav-link title-word-1  moving-text">Lembaga STMIK Mardira</span>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        {{-- FULL SCREEN --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt mr-2"></i>Full Screen
            </a>
        </li>
        {{-- ========================================================================================= --}}



        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" >
                <img src="{{ asset('AdminLTE/images/logo.jpg') }}" class="moving-img  user-image rounded-circle shadow"
                    alt="MardiraImage">
                <span style="margin-left: 10px" class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="moving-img user-header text-bg-primary">
                    <img src="{{ asset('AdminLTE/images/logo.jpg') }}" class="moving-img rounded-circle shadow" alt="MardiraImage">

                    <p>
                        Fajar Habib Zaelani - Web Developer
                        <small>Bandung, Jawa Barat.</small>
                    </p>
                </li>
            </ul>
        </li>
        {{-- ----------------------------------------------------------------------------------------------------------- --}}

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-power-off mr-2"></i> LOGOUT
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">Silahkan Logout</span>
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
                <a href="{{ url('logout') }}" class="dropdown-item" >
                    <i class="fas fa-users mr-2"></i> LOGOUT
                    <span class="float-right text-muted text-sm">Good Bye!</span>
                </a>

                <div class="dropdown-divider"></div>
            </div>
        </li>
        {{-- -------------------------------------------------------------------------------------------------------------------------- --}}
    </ul>
</nav>

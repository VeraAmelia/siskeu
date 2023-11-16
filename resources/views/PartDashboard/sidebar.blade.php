<style>
    .sideP {
        color: white
    }

    .nav-icon {
        color: white
    }

    .online {
        display: inline;
        margin: 0;
        padding: 0;
    }

    .title-word {
        animation: color-animation 4s linear infinite !important;
    }

    .title-word-1 {
        --color-1: orange !important;
        --color-2: yellow !important;
        --color-3: white !important;
    }


    @keyframes color-animation {
        0% {
            color: var(--color-1)
        }

        32% {
            color: var(--color-1)
        }

        33% {
            color: var(--color-2)
        }

        65% {
            color: var(--color-2)
        }

        66% {
            color: var(--color-3)
        }

        99% {
            color: var(--color-3)
        }

        100% {
            color: var(--color-1)
        }
    }

    @keyframes moveUpDown {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
            /* Atur nilai sesuai dengan jarak vertikal yang diinginkan */
        }
    }

    .moving-text {
        animation: moveUpDown 2s infinite;
        /* Atur durasi animasi dan pengulangan */
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center"> <!-- Tambahkan class "text-center" -->
        <span class="brand-text font-weight-light title-word-1"
            style="color: white !important; font-weight: 700 !important;">
            <span style="color: black; font-weight: 800;">Dashboard</span> Siskeu
        </span>
        <p class="brand-text font-weight-light"
            style="font-size: 14px; margin-top: 5px; color: white; font-weight: 500; background: black; border-radius: 5px;">
            <b>Tahun Anggaran {{ date('Y') }}</b>
        </p>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE/images/logo.jpg') }}" class=" img-circle elevation-2" alt="MardiraImage">
            </div>
            <div class="info" style="margin-top: -10px">
                <a href="#" class="d-block" style="color: white">{{ auth()->user()->name }}</a>

                <div class="online moving-img"
                    style=" width: 12px; height: 12px; display: flex; background: #0acf31ba; margin-top: 2px; border-radius: 100%;">
                    <p style="margin-bottom: -8px; color: black; margin-left: 18px; margin-top: -7px; font-weight: 650">
                        Online</p>
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Beranda -->
                @if (request()->is('beranda'))
                    <li class="nav-header">Halaman Utama</li>
                @endif

                <li class="nav-item">
                    <a href="{{ url('beranda') }}" class="nav-link {{ request()->is('beranda') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p class="sideP">
                            Beranda
                        </p>
                    </a>
                </li>
                <!-- End Beranda -->


                <!-- BOP -->
                @if (auth()->user()->level === 'Admin')
                @if (request()->is('pengajuanBOP*', 'biayaKepegawaian*', 'biayaUmumPengajuanBop*', 'saPrasaranaBop*'))
                    <li class="nav-header">Halaman Pengajuan BOP</li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('pengajuanBOP') }}"
                        class="nav-link {{ request()->is('pengajuanBOP', 'biayaKepegawaian*', 'biayaUmumPengajuanBop*', 'saPrasaranaBop*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p class="sideP">
                            Pengajuan BOP
                        </p>
                    </a>
                </li>
                @endif
                <!-- End BOP -->


                <!-- Laporan BOP-->
                @if (request()->is(
                        'laporanRinciBop*',
                        'biayaRinciKepegawaian*',
                        'biayaRinciSapras*', 
                        'rinciBiayaUmumBop*',
                       ))
                    <li class="nav-header">Halaman Rinci BOP</li>
                @endif

                <li class="nav-item">
                    <a href="{{ url('laporanRinciBop') }}"
                        class="nav-link {{ request()->is('laporanRinciBop*', 'biayaRinciKepegawaian*', 'biayaRinciSapras*', 'rinciBiayaUmumBop*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p class="sideP">
                            Realisasi Rinci BOP
                        </p>
                    </a>
                </li>
                <!-- End Laporan BOP-->

                @if (request()->is('diagram*'))
                    <li class="nav-header">Halaman Diagram</li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('diagram') }}" class="nav-link {{ request()->is('diagram*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p style="margin-top: -50px">Diagram</p>
                    </a>
                </li>



                <!-- Laporan BOP-->
                @if (request()->is('cetakLaporan*'))
                    <li class="nav-header">Halaman Mencetak Laporan</li>
                @endif

                <li class="nav-item">
                    <a href="{{ url('cetakLaporan') }}"
                        class="nav-link {{ request()->is('cetakLaporan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p class="sideP">
                            Data Laporan
                        </p>
                    </a>
                </li>
                <!-- End Laporan BOP-->

                <!-- Laporan Bulanan -->
                {{-- @if (request()->is('pendapatanBulanan*'))
                    <li class="nav-header">Halaman Laporan Bulanan</li>
                @endif
                <li class="nav-item {{ request()->is('pendapatanBulanan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-solid fa-print"></i>
                        <p class="sideP">
                            Laporan Bulanan
                            <i class="right fas fa-angle-left"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pendapatanBulanan*') ? 'active' : '' }}"
                                href="{{ url('pendapatanBulanan') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="sideP">Pendapatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="sideP">Pengeluaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="sideP">Biaya umum</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="sideP">Sarana & Prasarana</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <!-- End Laporan Bulanan -->



                @if (auth()->user()->level === 'Admin')
                @if (request()->is('users*'))
                    <li class="nav-header">Halaman Data Users</li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p style="margin-top: -50px">Data Users</p>
                    </a>
                </li>
                @endif

                <li class="nav-header">Halaman Keluar</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="logout()">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p style="margin-top: -50px">Logout</p>
                        <span class="right badge badge-danger">Keluar</span>
                    </a>
                </li>




                <!-- Logout -->
                <li class="nav-header" style="margin-top: 55px; text-align: center; color: orange"> ═════╗ Footer
                    Sidebar ╚═════ </li>

                <!-- End Logout -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    /* Your CSS styles here */
    .modal {
        transition-property: opacity, transform;
        transition-duration: 0.5s;
        transition-timing-function: ease-in-out;
    }


    .pagination-centered {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: -20px
    }

    .table th,
    .table td {
        max-width: 383px;
        /* Sesuaikan dengan lebar maksimum yang Anda inginkan */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .search-highlight {
        font-weight: bold;
    }

    .enlarge-image {
        position: relative;
        z-index: 1;
        /* Ubah z-index menjadi 1 untuk mengangkat gambar di atas elemen lain */
    }

    .enlarge-image {
        transition: transform 0.2s ease-in-out;
        /* Animasi transisi */
    }

    .enlarge-image:hover {
        transform: scale(1.1);
        /* Memperbesar gambar saat dihover */
    }

    .enlarge-image:hover {
        z-index: 2;
        /* Ketika gambar diperbesar, tingkatkan z-index untuk memastikan tampil di atas elemen lain */
    }

    /* Loading spinner */
    #loading {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left: 4px solid #007bff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    .loading-spinner {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
        margin-right: -1550;
        /* Tambahkan margin kiri otomatis */
    }

    .loading-spinner i {
        font-size: 48px;
        color: orange;
        /* Ubah warna menjadi oranye */
    }


    /* Transisi untuk modal saat muncul dan ditutup */
    .modal {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .modal.fade .modal-dialog {
        transition: transform 0.3s ease;
    }

    .modal.fade.show {
        opacity: 1;
        visibility: visible;
    }

    .modal.fade.show .modal-dialog {
        transform: translate(0, 0);
    }

    .modal.fade .modal-dialog {
        transform: translate(0, -50px);
        /* Atur pergeseran vertikal */
    }



    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .loading-text {
        margin-top: 10px;
        font-weight: bold;
        color: #333;
    }

    /* Mengatur warna teks dan latar belakang pada pagination */
    .pagination .page-item .page-link {
        color: white;
        /* Warna teks */
        background-color: orange;
        /* Warna latar belakang */
        border-color: orange;
        /* Warna garis bingkai (jika diperlukan) */
    }

    /* Mengatur teks tebal pada pagination */
    .pagination .page-item .page-link {
        font-weight: bold;
    }

    @media (max-width: 800px) {
        .card-tools {
            flex-direction: column;
            align-items: flex-start;
        }

        .d-flex.ml-auto {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    }

    @media (max-width: 700px) {
        .card-tools {
            align-items: center;
        }

        .input-group-lg {
            width: 100%;
            max-width: 100%;
            margin-right: 0 !important;
        }

        .hide-select {
            display: none;
        }
    }

    @media (max-width: 600px) {
        .card-tools {
            align-items: flex-start;
        }

        .input-group-lg {
            max-width: 100%;
        }

        .search-input-group {
            width: 100%;
        }
    }

    @media (max-width: 500px) {
        .input-group-lg {
            width: 100%;
            max-width: 100%;
        }
    }
</style>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <!-- Your breadcrumb content -->
            <div class="container-fluid">
                <div class="row mb-2">

                    {{-- BREADCUMB DI BAWAH --}}
                    <div class="col-sm-6">
                        <h1 class="m-0">Halaman Data Laporan</h1>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="">Halaman Data Laporan</a></li>
                        </ol>
                    </div>
                    {{-- BREADCUMB DI BAWAH --}}
                </div>
            </div>
        </div>

        <section class="content" style="padding: 20px !important">
            <div class="container-fluid">
                <div class="card card-orange">
                    <div class="card-header">
                        <h3 class="card-title" style="color: white; font-weight: 600">
                            Halaman Mencetak Data Laporan 
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus" style="color: white; font-weight: 600"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Small boxes -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">






                                    <div class="col-md-12">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="card card-widget widget-user shadow">
                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                            <div class="widget-user-header text-white"
                                                style="background: url('Logiin/stmik2.jpg') center center;">
                                                {{-- <h5 class="widget-user-desc" style="background: black; text-align: center !important; padding: 3px;">STMIK Mardira Indonesia   <br><span style="font-size: 14px; margin-bottom: 30px">Tahun
                                                    Anggaran {{ date('Y') }}</span></h5> --}}
                                                {{-- <h3 class="widget-user-username text-right">Elizabeth Pierce</h3> --}}

                                                {{-- <h5 class="widget-user-desc " style="font-size: 15px; background: black;">Tahun
                                                    Anggaran {{ date('Y') }}</h5> --}}
                                            </div>
                                            <div class="widget-user-image" style="margin-top: 10px">
                                                <img class="img-circle enlarge-image" src="{{ asset('AdminLTE/images/logo.jpg') }}"
                                                    alt="Logo Mardira">
                                            </div>
                                            
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <H2 style="font-size: 20px !important">STMIK Mardira Indonesia</H2>
                                                        <H2 style="font-size: 16px !important">Tahun Anggaran {{ date('Y') }}</H2>
                                                    </div>
                                                   
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <!-- Tombol "Mencetak Semua" -->
                                <div class="card-tools d-flex justify-content-center">
                                    <div style="margin-top: 15px;">
                                        <a href="{{ route('exportPdf') }}" id="cetakSemuaButton" class="button-85">
                                            <i class="fas fa-print"></i> Cetak Semua
                                        </a>
                                        <a href="#" class="button-85" data-toggle="modal"
                                            data-target="#cetakModal">
                                            <i class="fas fa-print"></i> Cetak Realisasi
                                        </a>
                                        <a href="#" class="button-85" data-toggle="modal"
                                            data-target="#cetakPengajuanModal">
                                            <i class="fas fa-print"></i> Cetak Pengajuan
                                        </a>
                                    </div>
                                </div>

                                <!-- Modal "Cetak Per Periode" -->
                                <div class="modal fade" id="cetakModal" tabindex="-1" role="dialog"
                                    aria-labelledby="cetakModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cetakModalLabel">Cetak Realisasi Per Periode</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="tglawal">Tanggal Awal</label>
                                                    <small>(Date)</small>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="tglawal" class="form-control"
                                                            id="tglawal" placeholder="Masukan Tanggal">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tglakhir">Tanggal Akhir</label>
                                                    <small>(Date)</small>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="tglakhir" class="form-control"
                                                            id="tglakhir" placeholder="Masukan Tanggal">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="button" id="cetakButton"
                                                    class="btn btn-primary">Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <!-- Modal "Cetak Per Periode" -->
                                <div class="modal fade" id="cetakPengajuanModal" tabindex="-1" role="dialog"
                                    aria-labelledby="cetakModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cetakModalLabel">Cetak Pengajuan Per Periode</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="tglawal">Tanggal Awal</label>
                                                    <small>(Date)</small>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="tglpengajuanawal" class="form-control"
                                                            id="tglpengajuanawal" placeholder="Masukan Tanggal">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tglakhir">Tanggal Akhir</label>
                                                    <small>(Date)</small>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" name="tglpengajuanakhir" class="form-control"
                                                            id="tglpengajuanakhir" placeholder="Masukan Tanggal">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="button" id="cetakPengajuanButton"
                                                    class="btn btn-primary">Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Loading Spinner -->
                                <div id="loading" class="loading-spinner">
                                    <i class="fas fa-spinner fa-spin"></i>
                                    <div class="loading-text">Loading...</div>

                                </div>



                            </div>
                    </div>
        </section>








        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cetakSemuaButton = document.getElementById('cetakSemuaButton');
            const loadingDiv = document.getElementById('loading');

            cetakSemuaButton.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah tindakan default dari tautan
                loadingDiv.style.display = 'flex';

                // Simulasi penutupan spinner setelah 1800 milidetik (1.8 detik)
                setTimeout(function() {
                    loadingDiv.style.display = 'none';
                    window.location.href = cetakSemuaButton.getAttribute(
                        'href'); // Pindah ke tautan cetak setelah spinner selesai
                }, 1800);
            });
        });
    </script>


    <script>
        // Function untuk menampilkan/menyembunyikan loading spinner
        function toggleLoading(show) {
            const loadingDiv = document.getElementById('loading');
            loadingDiv.style.display = show ? 'flex' : 'none';
        }

        document.addEventListener("DOMContentLoaded", function() {
            // When the "Cetak" button in the modal is clicked
            const cetakButton = document.getElementById('cetakButton');
            cetakButton.addEventListener('click', function() {
                toggleLoading(true); // Show loading spinner

                // Simulate PDF download after 1.7 seconds
                setTimeout(function() {
                    toggleLoading(false); // Hide loading spinner

                    // Replace with actual PDF download URL
                    window.location.href = '/cetakDataPertanggal/' +
                        document.getElementById('tglawal').value +
                        '/' + document.getElementById('tglakhir').value;
                }, 1700);
            });
        });
    </script>

<script>
    // Function untuk menampilkan/menyembunyikan loading spinner
    function toggleLoading(show) {
        const loadingDiv = document.getElementById('loading');
        loadingDiv.style.display = show ? 'flex' : 'none';
    }

    document.addEventListener("DOMContentLoaded", function() {
        // When the "Cetak" button in the modal is clicked
        const cetakPengajuanButton = document.getElementById('cetakPengajuanButton');
        cetakPengajuanButton.addEventListener('click', function() {
            toggleLoading(true); // Show loading spinner

            // Simulate PDF download after 1.7 seconds
            setTimeout(function() {
                toggleLoading(false); // Hide loading spinner

                // Replace with actual PDF download URL
                window.location.href = '/cetakPengajuanPertanggal/' +
                    document.getElementById('tglpengajuanawal').value +
                    '/' + document.getElementById('tglpengajuanakhir').value;
            }, 1700);
        });
    });
</script>

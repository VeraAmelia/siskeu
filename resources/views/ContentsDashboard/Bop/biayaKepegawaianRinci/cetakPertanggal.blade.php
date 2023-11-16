<style>
    .rupiah {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: bold;
        max-width: 18px;
        text-align: center;
        justify-content: center;
        margin-left: -5px;
        border-color: #ffc107;
    }

    .is-warning {
        border-color: #ffc107;
    }

    .input-group-x {
        display: flex;
        align-items: center;
    }

    .input-group-x .x-symbol {
        margin: 0 10px;
        font-weight: bold;
    }

    .input-group-prepend {
        margin-right: -2px;
        /* Menyesuaikan margin jika diperlukan */
    }

    .x-symbol {
        font-weight: bold;
        padding: 0 5px;
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
</style>


{{-- BREADCRUMB --}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                {{-- BREADCUMB DI BAWAH --}}
                <div class="col-sm-6">
                    <h1 class="m-0">Cetak Pertanggal</h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href="">Cetak Pertanggal</a></li>
                    </ol>
                </div>
                {{-- BREADCUMB DI BAWAH --}}

            </div>
        </div>
    </div>
    {{-- BREADCRUMB --}}


    <!-- !!! ISI HALAMAN KONTEN !!! -->
    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-orange">
                <div class="card-header">
                    <h3 class="card-title" style="color: white; font-weight: 600"><i class="fas fa-plus-circle"></i>
                        Halaman Cetak Pertanggal Biaya Kepegawaian (BOP)
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus" style="color: white; font-weight: 600"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        {{-- KONTEN KIRI --}}
                        <div class="col-md-6">
                            {{-- <form action="{{ route('biayaKepegawaianBop.store') }}" method="POST"> --}}

                            {{-- {{ csrf_field() }} --}}
                            <div class="form-group">
                                <label for="tglawal">Tanggal Awal</label>
                                <small>(Date)</small>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="tglawal" class="form-control" id="tglawal"
                                        placeholder="Masukan Tanggal">
                                </div>
                            </div>


                        </div>
                        <!-- /.col -->
                        {{-- KONTEN KIRI --}}


                        {{-- KONTEN KANAN --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="tglakhir">Tanggal Akhir</label>
                                <small>(Date)</small>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="tglakhir" class="form-control" id="tglakhir"
                                        placeholder="Masukan Tanggal">
                                </div>
                            </div>


                        </div>
                        <!-- /.col -->
                        {{-- KONTEN KANAN --}}
                    </div>
                    <!-- /.row -->

                    <div class="form-group mt-3">
                        <a href="#" id="cetakButton" class="button-31" style="color: white !important; ">Cetak</a>
                        <a href="biayaKepegawaianBop" class="button-33">Kembali</a>

                    </div>

                    {{-- </form> --}}

                </div>



                <div class="card-footer" style="margin-top: -25px">
                    Halaman <a href="#">Cetak Pertanggal (BOP)</a> Lembaga STMIK Mardira Indonesia.
                </div>

            </div>

            <!-- /.card -->
            <div id="loading">
                <div class="spinner"></div>
                <div class="loading-text">Loading...</div>
            </div>






        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- !!! ISI HALAMAN KONTEN !!! -->

{{-- SPINNER DOWNLOAD LOADING --}}
<script>
    //    function toggleLoading(show) {
    //             const loadingDiv = document.getElementById('loading');
    //             loadingDiv.style.display = show ? 'block' : 'none';
    //         }

    //         // When the "Cetak" button is clicked
    //         const cetakButton = document.getElementById('cetakButton');
    //         cetakButton.addEventListener('click', function() {
    //             toggleLoading(true); // Show loading spinner

    //             // Simulate PDF download after 3 seconds
    //             setTimeout(function() {
    //                 toggleLoading(false); // Hide loading spinner

    //                 // Trigger the PDF download link
    //                 window.location.href = '/cetakDataPertanggal/' +
    //                     document.getElementById('tglawal').value +
    //                     '/' + document.getElementById('tglakhir').value;
    //             }, 1500);
    //         });

    // Function untuk menampilkan/menyembunyikan loading spinner
    function toggleLoading(show) {
        const loadingDiv = document.getElementById('loading');
        loadingDiv.style.display = show ? 'flex' : 'none';
    }

    // When the "Cetak" button is clicked
    const cetakButton = document.getElementById('cetakButton');
    cetakButton.addEventListener('click', function() {
        toggleLoading(true); // Show loading spinner

        // Simulate PDF download after 3 seconds
        setTimeout(function() {
            toggleLoading(false); // Hide loading spinner

            // Replace with actual PDF download URL
            window.location.href = '/cetakDataPertanggal/' +
                document.getElementById('tglawal').value +
                '/' + document.getElementById('tglakhir').value;
        }, 1700);
    });
</script>

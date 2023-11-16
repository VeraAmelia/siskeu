<style>
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
        max-width: 220px;
        /* Sesuaikan dengan lebar maksimum yang Anda inginkan */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .search-highlight {
        font-weight: bold;
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


{{-- BREADCRUMB --}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                {{-- BREADCUMB DI BAWAH --}}
                <div class="col-sm-6">
                    <h1 class="m-0"> Pemasukan Rinci Laporan BOP</h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href=""> Pemasukan Rinci Laporan BOP</a></li>
                    </ol>
                </div>
                {{-- BREADCUMB DI BAWAH --}}
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    {{-- BREADCRUMB --}}


    <!-- !!! ISI HALAMAN KONTEN !!! -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-orange">
                <div class="card-header">
                    <h3 class="card-title" style="color: white; font-weight: 600">Halaman Utama Pemasukan Rinci Laporan
                        Biaya Operasional
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus" style="color: white; font-weight: 600"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="content">
                       

                            <!-- Small boxes -->
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">


                                        <div class="col-lg-3 col-6">
                                            <div class="small-box bg-orange">
                                                <div class="inner">
                                                    <p style="color: white !important; font-weight: 700">Jumlah Usulan:
                                                    </p>
                                                    <h4 style="color: white !important; font-weight: 700">Rp.
                                                        {{ number_format($sumjumlahusulan, 0, ',', '.') }}</h4>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-cash"></i>
                                                </div>
                                                <a href="{{ url('pemasukanbop') }}"
                                                    class="small-box-footer">Lihat Detail <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>


                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <p style="color: white !important; font-weight: 700">Jumlah Realisasi:
                                                    </p>
                                                    <h4 style="color: white !important; font-weight: 700">Rp.
                                                        {{ number_format($sumjumlahrealisasi, 0, ',', '.') }}</h4>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="{{ url('payrollpegawai') }}" class="small-box-footer">Lihat Detail <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <p style="color: white !important; font-weight: 700">Jumlah Sisa:
                                                    </p>
                                                    <h4 style="color: white !important; font-weight: 700">Rp.
                                                        {{ number_format($sumjumlahsisa, 0, ',', '.') }}</h4>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-stats-bars"></i>
                                                </div>
                                                <a href="{{ url('pemasukanbop') }}" class="small-box-footer">Lihat Detail <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </section>

                            <!-- Data Table -->
                            <div class="card card-orange card-outline">
                                <div class="card-tools d-flex justify-content-between">
                                    {{-- <div style="margin-top: 15px; margin-left: 10px">
                                        <a href="{{ route('exportPdf') }}" id="cetakSemuaButton" class="button-85">
                                            <i class="fas fa-print"></i> Cetak Semua
                                        </a>
                                        <a href="{{ route('cetakPertanggal') }}" class="button-85">
                                            <i class="fas fa-print"></i> Cetak Per Periode
                                        </a>
                                    </div> --}}
                                    {{-- <a href="{{ route('pemasukanbop.create') }}" class="button-85 ml-2"
                                        style="margin-right: 20px !important">
                                        Tambah Data <i class="fas fa-plus-square"></i>
                                    </a> --}}
                                    <a href="{{ route('pemasukanbop.create') }}" class="button-85 ml-2"
                                        style="margin-left: 20px !important">
                                        Tambah Data <i class="fas fa-plus-square"></i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="card-body table-responsive p-0">
                                        <div class="card-tools d-flex justify-content-between">
                                            <div class="d-flex">
                                                <label for="paginationSelect"
                                                    class="mr-2 hide-select">Tampilkan:</label>
                                                <select id="paginationSelect" class="form-control form-control-sm"
                                                    onchange="changePagination()" style="width: 200px">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-tools d-flex justify-content-between">
                                            <div class="d-flex ml-auto">
                                                <div class="search-input-group input-group input-group-lg"
                                                    style="width: 450px; margin-top: -32px; margin-right: -205px; margin-bottom: 10px;">
                                                    <form method="get" action="/pemasukanbop"
                                                        style="display: flex;">
                                                        <input type="text" name="search" class="form-control"
                                                            placeholder="Cari Data...">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                        <table class="table table-hover table-head-fixed  text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Uraian</th>
                                                    <th scope="col">Petugas</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Jumlah Pengajuan</th>
                                                    <th scope="col">Jumlah Realisasi</th>
                                                    <th scope="col">Jumlah Sisa</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($bop as $index => $user)
                                                    <tr>

                                                        {{-- <th scope="row">{{ $index + $users->firstItem() }}</th> --}}
                                                        <th scope="row">{{ $index + $bop->firstItem() }}</th>
                                                        <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td>
                                                        <td>{!! str_ireplace(
                                                            $search,
                                                            '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                            $user->uraian,
                                                        ) !!}</td>
                                                        <td>{!! str_ireplace(
                                                            $search,
                                                            '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                            $user->petugas,
                                                        ) !!}</td>
                                                        <td>{!! str_ireplace(
                                                            $search,
                                                            '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                            $user->keterangan,
                                                        ) !!}</td>
                                                        <td>{{ number_format($user->jumlahusulan, 0, ',', '.') }} </td>
                                                        <td>{{ number_format($user->jumlahrealisasi, 0, ',', '.') }}
                                                        </td>
                                                        <td>{{ number_format($user->jumlahsisa, 0, ',', '.') }} </td>
                                                        <td>
                                                            <a href="{{ route('pemasukanbop.edit', $user->id) }}"
                                                                class="button-33" role="button"><i
                                                                    class="fas fa-pencil-alt"></i></a>

                                                            <a href="javascript:void(0)" id="show-rincibop"
                                                                data-url="{{ route('pemasukanbop.show', $user->id) }}"
                                                                class="button-31" style="color: white !important"><i
                                                                    class="fas fa-eye"></i></a>


                                                            <form method="POST"
                                                                action="{{ route('pemasukanbop.destroy', $user->id) }}"
                                                                style="display: inline-block">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button title='Delete' type="submit"
                                                                    class="show_confirm button-32"
                                                                    data-toggle="tooltip"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <td colspan="5" class="text-bold"
                                                    style="text-align: left !important">
                                                    Total :</td>

                                                <td colspan=""> <b>
                                                        {{ number_format($sumjumlahusulan, 0, ',', '.') }}
                                                    </b></td>
                                                <td colspan=""> <b>
                                                        {{ number_format($sumjumlahrealisasi, 0, ',', '.') }} </b></td>
                                                <td colspan=""> <b>
                                                        {{ number_format($sumjumlahsisa, 0, ',', '.') }}
                                                    </b></td>
                                            </tbody>
                                            <td colspan="5" class="text-bold" style="text-align: left !important">
                                                Jumlah Sisa <small> (Jumlah Pengajuan - Jumlah Realisasi) </small>:
                                            </td>
                                            <td colspan="2"> <b> {{ number_format($sumjumlahsisa, 0, ',', '.') }}
                                                </b></td>
                                        </table>

                                        {{-- <div class="content">
                                            {{ $bop->onEachSide(0)->appends(['search' => $search])->links() }}</div> --}}

                                            <div class="d-flex justify-content-center">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        {{-- {{ $bop->onEachSide(0)->appends(['search' => $search])->links() }} --}}
                                                    </ul>
                                                </nav>
                                            </div>


                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /.row -->
                        {{-- Tabel responsive --}}



                        {{-- MODAL --}}
                        <div class="modal fade" id="userShowModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-eye"></i>
                                            Detail
                                            Pemasukan Realisasi BOP</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user-tanggal"
                                                            class="col-form-label">Tanggal:</label>
                                                        <input id="user-tanggal" type="text" class="form-control"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="user-uraian"
                                                            class="col-form-label">Uraian:</label>
                                                        <input id="user-uraian" type="text" class="form-control"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="user-petugas"
                                                            class="col-form-label text-right">Petugas:</label>
                                                        <input type="text" id="user-petugas" class="form-control"
                                                            readonly autocomplete="off">
                                                    </div>
                                                    <!-- Menambahkan label dan input di sebelah kanan -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user-jumlahusulan"
                                                            class="col-form-label text-right">Jumlah Usulan:</label>
                                                        <input type="text" id="user-jumlahusulan"
                                                            class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="user-jumlahrealisasi"
                                                            class="col-form-label text-right">Jumlah Realisasi:</label>
                                                        <input type="text" id="user-jumlahrealisasi"
                                                            class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="user-jumlahsisa"
                                                            class="col-form-label text-right">Jumlah
                                                            Sisa:</label>
                                                        <input type="text" id="user-jumlahsisa"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="user-keterangan"
                                                    class="col-form-label">Keterangan:</label>
                                                <textarea class="form-control" id="user-keterangan" readonly></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="button-33"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- END MODAL --}}
                    </div>
                    <!-- END Card Vody -->
                </div>
                {{-- card card-orange card-outline --}}
            </div>
            {{-- content --}}
        </div>
        {{-- card-body --}}
</div>
{{-- card card-orange --}}
</div>
{{-- container-fluid --}}

</section>
</div>
<!-- /.content -->

<script>
    function changePagination() {
        const selectedValue = document.getElementById('paginationSelect').value;
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', selectedValue);
        window.location.href = url.toString();
    }

    document.addEventListener("DOMContentLoaded", function() {
        const cetakSemuaButton = document.getElementById('cetakSemuaButton');
        const loadingDiv = document.getElementById('loading');

        cetakSemuaButton.addEventListener('click', function() {
            loadingDiv.style.display = 'flex';

            setTimeout(function() {
                loadingDiv.style.display = 'none';
            }, 1800);
        });
    });
</script>

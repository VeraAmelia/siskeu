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

    .small-box {
        /* Ganti warna latar belakang berdasarkan komponen RGB acak */

        color: white;
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
                        <h1 class="m-0">Pengajuan BOP</h1>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="">Pengajuan BOP</a></li>
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
                            Halaman Utama Pengajuan Biaya Operasional
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
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-orange">
                                            <div class="inner">
                                                <p style="color: white !important; font-weight: 700">Jumlah Pengajuan:
                                                </p>
                                                <h4 style="color: white !important; font-weight: 700">Rp.
                                                    {{ number_format($totalpengajuan, 0, ',', '.') }}</h4>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-cash"></i>
                                            </div>
                                            {{-- <a href="{{ url('saPrasaranaBop') }}" class="small-box-footer" style="color: white !important; ">Lihat Detail
                                                <i class="fas fa-arrow-circle-right"></i></a> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Data Table -->
                        <div class="card card-orange card-outline">
                            <div class="card-tools d-flex justify-content-between">


                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Tabel Pengajuan Biaya Operasional</h3>

                                                <div class="card-tools">
                                                    <form method="GET" action="{{ route('pengajuanBOP.index') }}">
                                                        <!-- Ganti 'nama_rute_anda' sesuai dengan rute yang sesuai di aplikasi Anda -->
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search"
                                                                class="form-control float-right" placeholder="Search">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <div class="mt-3">

                                                        @if (!empty($searchKeyword))
                                                            <div class="alert alert-info">
                                                                Hasil pencarian untuk:
                                                                <strong>{{ $searchKeyword }}</strong>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0" style="height: 500px;">
                                                <table class="table table-head-fixed table-hover text-nowrap">
                                                    <thead>
                                                        <tr class="h-table">
                                                            <th>No.</th>
                                                            <th>Unsur Biaya</th>
                                                            <th>Tanggal</th>
                                                            <th>Pengajuan</th>
                                                            <th>Keterangan</th>
                                                            <th style="text-align: center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-weight: 600">I</td>
                                                            <td style="font-weight: 600">Biaya Kepegawaian</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href="{{ route('biayaKepegawaian.create') }}"
                                                                    class="button-85 ml-2"
                                                                    style=" text-align: center !important; margin-left: 55px !important">
                                                                    Tambah Data <i class="fas fa-plus-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>


                                                        @php
                                                            $i = 1;
                                                        @endphp




                                                        @foreach ($bop as $index => $user)
                                                            <tr>
                                                                <th></th>


                                                                <td>
                                                                    @if (!empty($searchKeyword))
                                                                        @php
                                                                            $parts = explode($searchKeyword, $user->unsurbiaya);
                                                                        @endphp
                                                                        @if (count($parts) > 1)
                                                                            <span>{{ $parts[0] }}</span><span
                                                                                class="search-highlight">{{ $searchKeyword }}</span><span>{{ $parts[1] }}</span>
                                                                        @else
                                                                            {{ $user->unsurbiaya }}
                                                                        @endif
                                                                    @else
                                                                        {{ $user->unsurbiaya }}
                                                                    @endif
                                                                </td>


                                                                <td>{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}
                                                                </td>

                                                                <td>Rp.
                                                                    {{ number_format($user->pengajuan, 0, ',', '.') }}
                                                                </td>


                                                                <td>
                                                                    {{ $user->keterangan }}
                                                                </td>

                                                                <td style="text-align: center !important">
                                                                    <a href="{{ route('biayaKepegawaian.edit', $user->id) }}"
                                                                        class="button-33 btn-sm" role="button">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>

                                                                    <a href="javascript:void(0)" id="show-bop"
                                                                        data-url="{{ route('biayaKepegawaian.show', $user->id) }}"
                                                                        class="button-31 btn-sm"
                                                                        style="color: white !important"><i
                                                                            class="fas fa-eye"></i></a>
                                                                    <form method="POST"
                                                                        action="{{ route('biayaKepegawaian.destroy', $user->id) }}"
                                                                        style="display: inline-block">
                                                                        @csrf
                                                                        <input name="_method" type="hidden"
                                                                            value="DELETE">
                                                                        <button title='Delete' type="submit"
                                                                            class="show_confirm button-32  btn-sm"
                                                                            data-toggle="tooltip">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr>
                                                            <td style="font-weight: 600">II</td>
                                                            <td style="font-weight: 600">Biaya Umum</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href="{{ route('biayaUmumPengajuanBop.create') }}"
                                                                    class="button-85 ml-2"
                                                                    style="text-align: center !important; margin-left: 55px !important">
                                                                    Tambah Data <i class="fas fa-plus-square"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>&nbsp;&nbsp; a. Rumah Tangga dan Perlengkapan </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($biayaUmum as $index => $user)
                                                            <tr>

                                                                {{-- <th scope="row">{{ $index + $biayaUmum->firstItem() }}</th> --}}
                                                                <th></th>


                                                                <td>
                                                                    @if (!empty($searchKeyword))
                                                                        @php
                                                                            $unsurbiaya = $user->unsurbiaya;
                                                                            $detailbiaya = $user->detailbiaya;
                                                                            $detailatk = $user->detailatk;
                                                                            $detailtransportasi = $user->detailtransportasi;
                                                                            $detailinternet = $user->detailinternet;
                                                                            $detailkeamanan = $user->detailkeamanan;
                                                                            $partsUnsur = explode($searchKeyword, $unsurbiaya);
                                                                            $partsDetail = explode($searchKeyword, $detailbiaya);
                                                                            $partsAtk = explode($searchKeyword, $detailatk);
                                                                            $partsTransportasi = explode($searchKeyword, $detailtransportasi);
                                                                            $partsInternet = explode($searchKeyword, $detailinternet);
                                                                            $partsKeamanan = explode($searchKeyword, $detailkeamanan);
                                                                        @endphp
                                                                        @if (count($partsUnsur) > 1)
                                                                            <span>{{ $partsUnsur[0] }}</span><span
                                                                                class="search-highlight">{{ $searchKeyword }}</span><span>{{ $partsUnsur[1] }}</span>
                                                                        @elseif (count($partsDetail) > 1)
                                                                            <span>{{ $partsDetail[0] }}</span><span
                                                                                class="search-highlight">{{ $searchKeyword }}</span><span>{{ $partsDetail[1] }}</span>
                                                                        @elseif (count($partsAtk) > 1)
                                                                            <span>{{ $partsAtk[0] }}</span><span
                                                                                class="search-highlight">{{ $searchKeyword }}</span><span>{{ $partsAtk[1] }}</span>
                                                                        @elseif (count($partsTransportasi) > 1)
                                                                            <span>{{ $partsTransportasi[0] }}</span><span
                                                                                class="search-highlight">{{ $searchKeyword }}</span><span>{{ $partsTransportasi[1] }}</span>
                                                                        @elseif (count($partsInternet) > 1)
                                                                            <span>{{ $partsInternet[0] }}</span><span
                                                                                class="search-highlight">{{ $searchKeyword }}</span><span>{{ $partsInternet[1] }}</span>
                                                                        @elseif (count($partsKeamanan) > 1)
                                                                            <span>{{ $partsKeamanan[0] }}</span><span
                                                                                class="search-highlight">{{ $searchKeyword }}</span><span>{{ $partsKeamanan[1] }}</span>
                                                                        @else
                                                                            {{ $unsurbiaya }}
                                                                        @endif
                                                                    @else
                                                                        @if (strpos($user->unsurbiaya, 'a. Rumah Tangga dan Perlengkapan') !== false)
                                                                            {{ $user->detailbiaya }}
                                                                        @elseif (strpos($user->unsurbiaya, 'b. ATK') !== false)
                                                                            {{ $user->detailatk }}
                                                                        @elseif (strpos($user->unsurbiaya, 'c. Transportasi') !== false)
                                                                            {{ $user->detailtransportasi }}
                                                                        @elseif (strpos($user->unsurbiaya, 'e. Internet') !== false)
                                                                            {{ $user->detailinternet }}
                                                                        @elseif (strpos($user->unsurbiaya, 'g. Partisipasi Keamanan dan Kebersihan') !== false)
                                                                            {{ $user->detailkeamanan }}
                                                                        @else
                                                                            {{ $user->unsurbiaya }}
                                                                        @endif
                                                                    @endif
                                                                </td>





                                                                <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}
                                                                </td>
                                                                <td>{{ number_format($user->pengajuan, 0, ',', '.') }}

                                                                <td>
                                                                    {{ $user->keterangan }}
                                                                </td>
                                                                </td>

                                                                <td style="text-align: center !important">
                                                                    <a href="{{ route('biayaUmumPengajuanBop.edit', $user->id) }}"
                                                                        class="button-33 btn-sm" role="button"><i
                                                                            class="fas fa-pencil-alt"></i></a>

                                                                    <a href="javascript:void(0)" id="show-bop"
                                                                        data-url="{{ route('biayaUmumPengajuanBop.show', $user->id) }}"
                                                                        class="button-31 btn-sm"
                                                                        style="color: white !important"><i
                                                                            class="fas fa-eye"></i></a>




                                                                    <form method="POST"
                                                                        action="{{ route('biayaUmumPengajuanBop.destroy', $user->id) }}"
                                                                        style="display: inline-block">
                                                                        @csrf
                                                                        <input name="_method" type="hidden"
                                                                            value="DELETE">
                                                                        <button title='Delete' type="submit"
                                                                            class="show_confirm button-32  btn-sm"
                                                                            data-toggle="tooltip"><i
                                                                                class="fas fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr>
                                                            <td style="font-weight: 600">III</td>
                                                            <td style="font-weight: 600">Biaya Sarana Prasarana
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href="{{ route('saPrasaranaBop.create') }}"
                                                                    class="button-85 ml-2"
                                                                    style="text-align: center !important; margin-left: 55px !important">
                                                                    Tambah Data <i class="fas fa-plus-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($biayaSaprasBop as $index => $user)
                                                            <tr>

                                                                {{-- <th scope="row">{{ $index + $bop->firstItem() }}</th>   --}}
                                                                <th></th>

                                                                <td>
                                                                    {{ $user->unsurbiaya }}
                                                                </td>
                                                                {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                                                                <td>{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}
                                                                </td>

                                                                <td>Rp.
                                                                    {{ number_format($user->pengajuan, 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    {{ $user->keterangan }}
                                                                </td>
                                                                <td style="text-align: center !important">
                                                                    <a href="{{ route('saPrasaranaBop.edit', $user->id) }}"
                                                                        class="button-33 btn-sm" role="button"><i
                                                                            class="fas fa-pencil-alt"></i></a>

                                                                    <a href="javascript:void(0)" id="show-bop"
                                                                        data-url="{{ route('saPrasaranaBop.show', $user->id) }}"
                                                                        class="button-31 btn-sm"
                                                                        style="color: white !important"><i
                                                                            class="fas fa-eye"></i></a>


                                                                    <form method="POST"
                                                                        action="{{ route('saPrasaranaBop.destroy', $user->id) }}"
                                                                        style="display: inline-block">
                                                                        @csrf
                                                                        <input name="_method" type="hidden"
                                                                            value="DELETE">
                                                                        <button title='Delete' type="submit"
                                                                            class="show_confirm button-32 btn-sm"
                                                                            data-toggle="tooltip"><i
                                                                                class="fas fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        <tr>
                                                            <td colspan="3" class="text-bold"
                                                                style="text-align: center !important"> Total
                                                                Pengajuan:</td>
                                                            <td colspan="2">
                                                                <b>Rp.
                                                                    {{ number_format($totalpengajuan, 0, ',', '.') }}</b>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                                {{-- MODAL --}}
                                                <div class="modal fade" id="userShowModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fas fa-eye"></i> Detail Pengajuan Biaya
                                                                    Operasional </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="user-unsurbiaya"
                                                                            class="col-form-label">Unsur
                                                                            Biaya:</label>
                                                                        <input id="user-unsurbiaya" type="text"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group"> <label
                                                                            for="user-pengajuan"
                                                                            class="col-form-label">Pengajuan:</label>
                                                                        <input type="text" id="user-pengajuan"
                                                                            class="form-control" readonly>
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

                                                {{-- MODAL --}}
                                                <div class="modal fade" id="userShowModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fas fa-eye"></i> Detail Pengajuan Biaya
                                                                    Umum BOP </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="user-unsurbiaya"
                                                                            class="col-form-label">Unsur
                                                                            Biaya:</label>
                                                                        <input id="user-unsurbiaya" type="text"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group"> <label
                                                                            for="user-pengajuan"
                                                                            class="col-form-label">Pengajuan:</label>
                                                                        <input type="text" id="user-pengajuan"
                                                                            class="form-control" readonly>
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

                                                <div id="loading" style="display: none;">
                                                    <div class="spinner"></div>
                                                    <div class="loading-text">Loading...</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </section>
    </div>

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
                        <h1 class="m-0">Biaya Kepegawaian</h1>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="">Biaya Kepegawaian</a></li>
                        </ol>
                    </div>
                    {{-- BREADCUMB DI BAWAH --}}
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-orange">
                    <div class="card-header">
                        <h3 class="card-title" style="color: white; font-weight: 600">
                            Halaman Utama Biaya Kepegawaian (BOP) Biaya Operasional
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
                                            <a href="{{ url('biayaKepegawaianBop') }}" class="small-box-footer">Lihat
                                                Detail <i class="fas fa-arrow-circle-right"></i></a>
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
                                {{-- <a href="{{ route('biayaKepegawaianBop.create') }}" class="button-85 ml-2"
                                    style="margin-right: 20px !important">
                                    Tambah Data <i class="fas fa-plus-square"></i>
                                </a> --}}
                            </div>

                            <div class="card-body">
                                <div class="card-body table-responsive p-0">

                                            <div class="row">
                                                <div class="col-12">
                                                  <div class="card">
                                                    <div class="card-header">
                                                      {{-- <h3 class="card-title">Fixed Header Table</h3> --}}
                                      
                                                      <div class="card-tools">
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                      
                                                          <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                              <i class="fas fa-search"></i>
                                                            </button>
                                                          </div>
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
                                                                <th>Jabatan_id</th>
                                                                <th>Jumlahrealis_id</th>
                                                                <th>Keterangan</th>
                                                                <th>Aksi</th>
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
                                                                    <a href="{{ route('biayaKepegawaianBop.create') }}"
                                                                        class="button-85 ml-2"
                                                                        style="margin-left: -8px !important; max-width: 40px !important;">
                                                                        Tambah Data <i class="fas fa-plus-square"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                
                                                         
                                                            @php
                                                                $i = 1;
                                                            @endphp
                
                
                
                
                                                            @foreach ($bop as $index => $user)
                                                                <tr>
                                                                    {{-- <th scope="row">{{ $index + $bop->firstItem() }}</th> --}}
                                                                    <th></th>
                                                                    <td>
                
                                                                        @if (strpos($user->unsurbiaya, 'f. Biaya Pengembangan SDM') !== false)
                                                                            {{ $user->detailbiaya }}
                                                                        @else
                                                                            {{ $user->unsurbiaya }}
                                                                        @endif
                                                                    </td>
                                                                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                                                                    <td>{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}</td>

                                                                    <td>Rp. {{ number_format($user->pengajuan, 0, ',', '.') }}</td>
                                                                    <td> {{ $user->jabatan->jabatan}} </td>
                                                                    {{-- <td> {{ $user->id_pengajuan->id_pengajuan}} </td> --}}
                                                                    <td>{{ isset($user->jumlahrealisasi->jumlahrealisasi) ? number_format($user->jumlahrealisasi->jumlahrealisasi, 0, ',', '.') : '' }}</td>
                                                                    <td>{!! str_ireplace(
                                                                        $search,
                                                                        '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                                        $user->keterangan,
                                                                    ) !!}</td>
                                                                    <td>
                                                                        <a href="{{ route('biayaKepegawaianBop.edit', $user->id) }}"
                                                                            class="button-33" role="button">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        {{-- <a href="{{ route('biayaKepegawaianBop.create') }}" class="button-31" style="color: white !important">
                                                                      <i class="fas fa-plus"></i>
                                                                  </a> --}}
                                                                        <form method="POST"
                                                                            action="{{ route('biayaKepegawaianBop.destroy', $user->id) }}"
                                                                            style="display: inline-block">
                                                                            @csrf
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            <button title='Delete' type="submit"
                                                                                class="show_confirm button-32" data-toggle="tooltip">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        
                                             


                                            {{-- <tr>
                                                <td colspan="4" class="text-bold"
                                                    style="text-align: left !important">Total Pengajuan:</td>
                                                <td colspan="">
                                                    <b>{{ number_format($totalpengajuan, 0, ',', '.') }}</b>
                                                </td>
                                            </tr>
                                        @endif --}}

                                            <tr>
                                                <td style="font-weight: 600">II</td>
                                                <td style="font-weight: 600">Biaya Umum</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{ route('biayaUmumPengajuanBop.create') }}"
                                                        class="button-85 ml-2"
                                                        style="margin-left: -8px !important; max-width: 40px !important;">
                                                        Tambah Data <i class="fas fa-plus-square"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2">&nbsp;&nbsp; a. Rumah Tangga dan Perlengkapan </td>
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

                                                    {{-- <td>{!! str_ireplace(
                                                        $search,
                                                        '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                        $user->unsurbiaya,
                                                    ) !!}</td> --}}
                                                    <td>
                                                        @if (strpos($user->unsurbiaya, 'a. Rumah Tangga dan Perlengkapan') !== false)
                                                            {{ $user->detailbiaya }}
                                                        @elseif (strpos($user->unsurbiaya, 'e. Internet') !== false)
                                                            {{ $user->detailinternet }}
                                                        @else
                                                            {{ $user->unsurbiaya }}
                                                        @endif



                                                    </td>



                                                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                                                    <td>{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}</td>

                                                    <td>Rp. {{ number_format($user->pengajuan, 0, ',', '.') }}</td>
                                                    <td>{!! str_ireplace(
                                                        $search,
                                                        '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                        $user->keterangan,
                                                    ) !!}</td>
                                                    <td>
                                                        {{-- <a href="{{ route('biayaUmumPengajuanBop.edit', $user->id) }}"
                                                            class="button-33" role="button"><i
                                                                class="fas fa-pencil-alt" ></i></a> --}}
                                                        <a href="{{ route('biayaUmumPengajuanBop.edit', $user->id) }}"
                                                            class="button-33" role="button"><i
                                                                class="fas fa-pencil-alt" ></i></a>

                                                        {{-- <a href="javascript:void(0)" id="show-bop"
                                                    data-url="{{ route('biayaUmumPengajuanBop.show', $user->id) }}"
                                                    class="button-31" style="color: white !important"><i
                                                        class="fas fa-eye"></i></a> --}}


                                                        {{-- <a href="{{ route('biayaUmumPengajuanBop.create') }}"
                                                            class="button-31" style="color: white !important"><i
                                                                class="fas fa-plus"></i></a> --}}

                                                        <form method="POST"
                                                            action="{{ route('biayaUmumPengajuanBop.destroy', $user->id) }}"
                                                            style="display: inline-block">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button title='Delete' type="submit"
                                                                class="show_confirm button-32" data-toggle="tooltip"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- <tr>
                                        <td colspan="4" class="text-bold"
                                            style="text-align: left !important">Total Pengajuan:</td>
                                        <td colspan="">
                                            <b>{{ number_format($totalpengajuan, 0, ',', '.') }}</b>
                                        </td>
                                    </tr>
                                @endif --}}

                                            <tr>
                                                <td style="font-weight: 600">III</td>
                                                <td style="font-weight: 600">Biaya Sarana Prasarana</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{ route('saPrasaranaBop.create') }}"
                                                        class="button-85 ml-2"
                                                        style="margin-left: -8px !important; max-width: 40px !important;">
                                                        Tambah Data <i class="fas fa-plus-square"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($saPrasaranaBop as $index => $user)
                                                <tr>

                                                    {{-- <th scope="row">{{ $index + $bop->firstItem() }}</th>   --}}
                                                    <th></th>

                                                    <td>{!! str_ireplace(
                                                        $search,
                                                        '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                        $user->unsurbiaya,
                                                    ) !!}</td>
                                                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                                                    <td>{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}</td>

                                                    <td>Rp. {{ number_format($user->pengajuan, 0, ',', '.') }}</td>
                                                    <td>{!! str_ireplace(
                                                        $search,
                                                        '<strong style="color: black; font-weight: bold;">' . $search . '</strong>',
                                                        $user->keterangan,
                                                    ) !!}</td>
                                                    <td>
                                                        <a href="{{ route('saPrasaranaBop.edit', $user->id) }}"
                                                            class="button-33" role="button"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                        {{-- <a href="javascript:void(0)" id="show-bop"
                                                            data-url="{{ route('biayaUmumPengajuanBop.show', $user->id) }}"
                                                            class="button-31" style="color: white !important"><i
                                                                class="fas fa-eye"></i></a> --}}

                                                        {{-- <a href="{{ route('saPrasaranaBop.create') }}"
                                                            class="button-31" style="color: white !important"><i
                                                                class="fas fa-plus"></i></a> --}}

                                                        <form method="POST"
                                                            action="{{ route('saPrasaranaBop.destroy', $user->id) }}"
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
                                            
                                            <tr>
                                        <td colspan="3" class="text-bold"
                                            style="text-align: center !important"> Total Pengajuan:</td>
                                        <td colspan="2">
                                            <b>{{ number_format($totalpengajuan, 0, ',', '.') }}</b>
                                        </td>
                                    </tr>
                                        </tbody>

                                    </table>

                                    {{-- <div class="d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            {{ $bop->onEachSide(0)->appends(['search' => $search])->links() }}
                                        </ul>
                                    </nav>
                                </div> --}}

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


    {{-- <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-eye"></i> Detail
                Biaya Kepegawaian (BOP) </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="user-tanggal" class="col-form-label">Tanggal:</label>
                    <input id="user-tanggal" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="user-unsurbiaya" class="col-form-label">Unsur
                        Biaya:</label>
                    <input id="user-unsurbiaya" type="text" class="form-control" readonly>
                </div>
                <div class="form-group"> <label for="user-pengajuan"
                        class="col-form-label">Pengajuan:</label>
                    <input type="text" id="user-pengajuan" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="user-keterangan" class="col-form-label">Keterangan:</label>
                    <textarea class="form-control" id="user-keterangan" readonly></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="button-33" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div> --}}

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

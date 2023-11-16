<!DOCTYPE html>
<html>

<head>
    <title>Laporan Biaya Kepegawaian</title>
    <style>
        /* Add your CSS styles here */
        * {
            font-weight: 40;
        }

        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-bold {
            font-weight: bold;
        }

        .small-text {
            font-size: 14px;
            font-family: 'Times New Roman', Times, serif;
        }

        .kepala-surat {
            font-size: 16px;
            font-family: 'Times New Roman', Times, serif;
        }

        .center-text {
            text-align: center;
        }

        .table-header h4 {
            font-size: 12px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            clear: both;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .tengah {
            font-size: 16px !important;
        }

        h5 {
            font-size: 10px !important;
        }

        .tebal {
            border-top: 2 px solid #000;
        }

        /* Add watermark as background */
        body::before {
            content: "";
            position: fixed;
            top: 50%;
            /* Center vertically */
            left: 50%;
            /* Center horizontally */
            transform: translate(-50%, -50%);
            /* Adjust for centering */
            width: 700px;
            height: 400px;
            background-image: url('{{ public_path('logoo.png') }}');
            background-size: contain;
            /* Scale image to fit within the element */
            background-position: center center;
            /* Center the image */
            background-repeat: no-repeat;
            /* Prevent repeating of the image */
            opacity: 0.2;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; padding: 0; vertical-align: middle;">
                <img src="{{ public_path('logoo.png') }}" style="margin-left: 35px" alt="Logo" width="70"
                    height="70">
            </td>
            <td class="tengah small-text text-bold" style="width: 190%;">
                <div class="center-text text-bold">
                    <h2 class="kepala-surat text-bold">STMIK MARDIRA INDONESIA</h2>
                    <h2 class="kepala-surat text-bold">LAPORAN SEMUA PENGGUNAAN BIAYA OPERASIONAL </h2>
                    <p class="small-text text-bold">Alamat : Jl. Soekarno-Hatta No. 211 Leuwipanjang, Situsaeur, Kec.
                        Bojongloa
                        Kidul, Kota Bandung, Jawa Barat 40233 ; Telepon : 0225230382</p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr class="tebal">
            </td>
        </tr>
    </table>

    <div class="table-header" style="display: flex; align-items: center;">
        <h5 class="small-text"><span class="small-text text-bold">No:</span> <span class="small-text "
                style="font-weight: normal;">142/SP/C/STMIK-MI/VII/{{ date('Y') }}</span></h5>
                <h5 class="small-text"><span class="small-text text-bold">Hal:</span> <span class="small-text "
                        style="font-weight: normal;"> Laporan Realisasi Penggunaan Biaya Operasional</span></h5>
                {{-- <h5 class="small-text"><span class="small-text text-bold">Hal:</span> <span class="small-text "
                        style="font-weight: normal;"> Laporan Realisasi Penggunaan Biaya Operasional {{ $namaBulan }} {{ $tahunSekarang }} </span></h5> --}}
        <h5 class="small-text"><span class="small-text text-bold">Periode:</span> <span class="small-text "
                style="font-weight: normal;">
                {{ date('d-m-Y') }}</span></h5>
                <h5 class="small-text"><span class="small-text text-bold">Yang Melaporkan:</span> <span class="small-text "
                    style="font-weight: normal;">  Admin   BAUF STMIK Mardira </span></h5>
    </div>
    
    <table>
        <thead>
            <tr>
                <th class="small-text text-bold">No.</th>
                <th class="small-text text-bold">Unsur Biaya</th>
                <th class="small-text text-bold">Tanggal</th>
                <th class="small-text text-bold">Pengajuan</th>
                <th class="small-text text-bold">Realisasi</th>
                <th class="small-text text-bold">Jumlah Sisa</th>
                <th class="small-text text-bold">Petugas</th>
                <th class="small-text text-bold">Keterangan</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>~</td>
                <td class="small-text text-bold">PEMASUKAN</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="small-text text-bold">I</td>
                <td class="small-text text-bold">Biaya Kepegawaian</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>
            </tr>


            @php
                $i = 1;
            @endphp




            @foreach ($bop as $index => $user)
                <tr>
                    {{-- <th scope="row">{{ $index + $bop->firstItem() }}</th> --}}
                    <th></th>
                    <td class="small-text">
                        {{ $user->unsurbiaya }}

                    </td>
                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                    <td class="small-text">{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}
                    </td>

                    <td class="small-text">
                        {{ number_format($user->pengajuan, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ number_format($user->realisasi_pengeluaran, 0, ',', '.') }}
                    </td>
                    <td class="small-text"> 
                        {{ number_format($user->sisa_pengeluaran, 0, ',', '.') }}
                    </td>

                    <td class="small-text">
                        {{ $user->petugas_pengeluaran }}
                    </td>

                    <td class="small-text">
                        {{ $user->keterangan }}
                    </td>
                </tr>
            @endforeach

            <tr>
                <td class="small-text text-bold">II</td>
                <td class="small-text text-bold">Biaya Umum</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>


                </td>
            </tr>
            <tr>
                <td></td>
                <td class="small-text"> a. Rumah Tangga dan Perlengkapan </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($biayaUmum as $index => $user)
                <tr>

                    {{-- <th scope="row">{{ $index + $biayaUmum->firstItem() }}</th> --}}
                    <th></th>

                    <td class="small-text">

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
                    </td>

                    <td class="small-text">{{ date('d-m-Y', strtotime($user->tanggal)) }}
                    </td>
                    <td class="small-text"> {{ number_format($user->pengajuan, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ number_format($user->realisasi_pengeluaran, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ number_format($user->sisa_pengeluaran, 0, ',', '.') }}
                    </td>

                    <td class="small-text">
                        {{ $user->petugas_pengeluaran }}
                    </td>

                    <td class="small-text">
                        {{ $user->keterangan }}
                    </td>

                </tr>
            @endforeach


            <tr>
                <td class="small-text text-bold">III</td>
                <td class="small-text text-bold">Biaya Sarana Prasarana
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($biayaSaprasBop as $index => $user)
                <tr>

                    {{-- <th scope="row">{{ $index + $bop->firstItem() }}</th>   --}}
                    <th></th>

                    <td class="small-text">
                        {{ $user->unsurbiaya }}
                    </td>
                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                    <td class="small-text">{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}
                    </td>

                    <td class="small-text">
                        {{ number_format($user->pengajuan, 0, ',', '.') }}
                    </td>
                    <td class="small-text"> {{ number_format($user->realisasi_pengeluaran, 0, ',', '.') }}</td>
                    <td class="small-text"> {{ number_format($user->sisa_pengeluaran, 0, ',', '.') }}</td>
                    <td class="small-text">
                        {{ $user->petugas_pengeluaran }}
                    </td>
                    <td class="small-text">
                        {{ $user->keterangan }}
                    </td>
                </tr>
            @endforeach
            {{-- END PEMASUKAN --}}
            {{-- =========================================================================================================================================== --}}

            <tr>
                <td class="small-text text-bold">~</td>
                <td class="small-text text-bold">PENGELUARAN</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="small-text text-bold">I</td>
                <td class="small-text text-bold">Biaya Kepegawaian</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>
            </tr>


            @php
                $i = 1;
            @endphp




            @foreach ($bop as $index => $user)
                <tr>
                    {{-- <th scope="row">{{ $index + $bop->firstItem() }}</th> --}}
                    <th></th>
                    <td class="small-text">
                        {{ $user->unsurbiaya }}
                    </td>
                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                    <td class="small-text">{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}
                    </td>

                    <td class="small-text">
                        {{ number_format($user->pengajuan, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ number_format($user->realisasi, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ number_format($user->sisa, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ $user->petugas }}
                    </td>

                    <td class="small-text">
                        {{ $user->keterangan }}
                    </td>
                </tr>
            @endforeach

            <tr>
                <td class="small-text text-bold">II</td>
                <td class="small-text text-bold">Biaya Umum</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>


                </td>
            </tr>
            <tr>
                <td></td>
                <td class="small-text"> a. Rumah Tangga dan Perlengkapan </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($biayaUmum as $index => $user)
                <tr>

                    {{-- <th scope="row">{{ $index + $biayaUmum->firstItem() }}</th> --}}
                    <th></th>

                   
                    <td class="small-text">
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
                    </td>



                    <td class="small-text">{{ date('d-m-Y', strtotime($user->tanggal)) }}
                    </td>
                    <td class="small-text">  {{ number_format($user->pengajuan, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ number_format($user->realisasi, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ number_format($user->sisa, 0, ',', '.') }}
                    </td>
                    <td class="small-text">
                        {{ $user->petugas }}
                    </td>

                    <td class="small-text">
                        {{ $user->keterangan }}
                    </td>

                </tr>
            @endforeach
            

            <tr>
                <td class="small-text text-bold">III</td>
                <td class="small-text text-bold">Biaya Sarana Prasarana
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($biayaSaprasBop as $index => $user)
                <tr>

                    {{-- <th scope="row">{{ $index + $bop->firstItem() }}</th>   --}}
                    <th></th>

                    <td class="small-text">
                        {{ $user->unsurbiaya }}
                    </td>
                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                    <td class="small-text">{{ $user->tanggal ? date('d-m-Y', strtotime($user->tanggal)) : '' }}
                    </td>

                    <td class="small-text">
                        {{ number_format($user->pengajuan, 0, ',', '.') }}
                    </td>
                    <td class="small-text"> {{ number_format($user->realisasi, 0, ',', '.') }}</td>
                    <td class="small-text"> {{ number_format($user->sisa, 0, ',', '.') }}</td>
                    <td class="small-text">
                        {{ $user->petugas }}
                    </td>
                    <td class="small-text">
                        {{ $user->keterangan }}
                    </td>

                </tr>
            @endforeach
            {{-- END PENGELUARAN --}}
            {{-- =========================================================================================================================================== --}}



            <tr>
                <td colspan="3" class="small-text text-bold" style="text-align: center !important"> Total:</td>
                <td colspan="" class="small-text">
                    <b>
                        {{ number_format($totalpengajuan, 0, ',', '.') }}</b>
                </td>
                <td colspan="" class="small-text">
                    <b>
                        {{ number_format($totalrealisasi, 0, ',', '.') }}</b>
                </td>
                <td colspan="" class="small-text">
                    <b>
                        {{ number_format($totalsisa, 0, ',', '.') }}</b>
                </td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    <!-- Footer -->
    <div class="footer">
        <div class="clearfix">
            <div class="float-left">
                <p class="small-text">Mengetahui :</p>
                <p class="small-text text-bold"> Ketua STMIK MI</p>
                <br><br><br>
                <p class="small-text text-bold"> Dr. Marjito, M.Pd.</p>
                <p class="small-text">Nik. 95.01.017</p>
            </div>
            <div class="float-right">
                <p class="small-text">Bandung, {{ date('d-m-Y') }}.</p>
                <p class="small-text text-bold">Wakil Ketua II </p>
                <br><br><br>
                <p class="small-text text-bold"> Dr. Rinawati, S.Pd., M.M.</p>
                <p class="small-text">Nik. 98.01.034</p>
            </div>
        </div>
    </div>
</body>

</html>

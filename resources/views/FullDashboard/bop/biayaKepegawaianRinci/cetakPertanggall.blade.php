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

        .nested {
            padding-left: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-bold {
            font-weight: bold;
        }

        .small-text {
            font-size: 10px;
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
                <img src="{{ public_path('logoo.png') }}" style="margin-left: -4px" alt="Logo" width="70"
                    height="70">
            </td>
            <td class="tengah small-text text-bold" style="width: 190%;">
                <div class="center-text text-bold">
                    <h2 class="small-text text-bold">STMIK MARDIRA INDONESIA</h2>
                    <h2 class="small-text text-bold">LAPORAN REALISASI PENGGUNAAN BIAYA OPERASIONAL </h2>
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
        <h5 class="small-text"><span class="text-bold">No : </span> <span
                style="font-weight: normal;">142/SP/C/STMIK-MI/VII/2023
            </span></h5>
        {{-- <h5 class="small-text"><span class="text-bold">Peiode:</span> <span style="font-weight: normal;"> {{ $tglawal - $tglakhir }} </span></h5> --}}
        <h5 class="small-text"><span class="text-bold">Periode:</span> <span style="font-weight: normal;">
                {{ $tglawal }} - {{ $tglakhir }} </span></h5>

        <h5 class="small-text"><span class="text-bold">Hal :</span> <span style="font-weight: normal;">Pengajuan Biaya
                Operasional Juli 2023</span></h5>
    </div>


    {{-- <div class="table-header">
        <h5 class="text-bold">Laporan Biaya Kepegawaian</h5>
    </div> --}}
    </div>
    <table >
        <thead>
            <tr>
                <th class="small-text text-bold">No.</th>
                <th class="small-text text-bold">Unsur Biaya</th>
                <th class="small-text text-bold">Tanggal</th>
                <th class="small-text text-bold">Pengajuan</th>
                <th class="small-text text-bold">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="small-text">i</td>
                <td class="small-text">Biaya Kepegawaian</td>
                <td class="small-text" style="border: none"></td>
                <td class="small-text" style="border: none"></td>
                <td class="small-text" style="border-left: none"></td>
            </tr>
            @php
                $no = 0;
            @endphp
            @foreach ($cetakPertanggall as $item)
                <tr>
                    <td></td>
                    <td class="small-text">{{ $item->unsurbiaya }}</td>
                    <td class="small-text">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td class="small-text">{{ number_format($item->pengajuan, 0, ',', '.') }}</td>
                    <td class="small-text">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-bold small-text" style="text-align: left !important">Total Pengajuan :
                </td>
                <td colspan="2" class="small-text text-bold">{{ number_format($totalPengajuan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="table-header">
        <h5 class="text-bold">Laporan Biaya Umum</h5>
    </div>
    </div>
    <table >
        <thead>
            <tr>
                <th class="small-text text-bold">No.</th>
                <th class="small-text text-bold">Unsur Biaya</th>
                <th class="small-text text-bold">Tanggal</th>
                <th class="small-text text-bold">Pengajuan</th>
                <th class="small-text text-bold">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($cetakPertanggall2 as $item)
                <tr>
                    <td class="small-text">{{ ++$no }}.</td>
                    <td class="small-text">{{ $item->unsurbiaya }}</td>
                    <td class="small-text">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td class="small-text">{{ number_format($item->pengajuan, 0, ',', '.') }}</td>
                    <td class="small-text">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-bold small-text" style="text-align: left !important">Total Pengajuan :
                </td>
                <td colspan="2" class="small-text text-bold">{{ number_format($totalPengajuan2, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="table-header">
        <h5 class="text-bold">Laporan Sarana Prasarana</h5>
    </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="small-text text-bold">No.</th>
                <th class="small-text text-bold">Unsur Biaya</th>
                <th class="small-text text-bold">Tanggal</th>
                <th class="small-text text-bold">Pengajuan</th>
                <th class="small-text text-bold">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($cetakPertanggall3 as $item)
                <tr>
                    <td class="small-text">{{ ++$no }}.</td>
                    <td class="small-text">{{ $item->unsurbiaya }}</td>
                    <td class="small-text">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td class="small-text">{{ number_format($item->pengajuan, 0, ',', '.') }}</td>
                    <td class="small-text">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-bold small-text" style="text-align: left !important">Total Pengajuan :
                </td>
                <td colspan="2" class="small-text text-bold">{{ number_format($totalPengajuan3, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>



    <div class="table-header">
        <h5 class="text-bold">Laporan Biaya Umum</h5>
    </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="small-text text-bold">No.</th>
                <th class="small-text text-bold">Unsur Biaya</th>
                <th class="small-text text-bold">Tanggal</th>
                <th class="small-text text-bold">Pengajuan</th>
                <th class="small-text text-bold">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($cetakPertanggall2 as $item)
                <tr>
                    <td class="small-text">{{ ++$no }}.</td>
                    <td class="small-text">{{ $item->unsurbiaya }}</td>
                    <td class="small-text">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    {{-- <td class="small-text">{{ $item->pengajuan }}</td> --}}
                    <td class="small-text">{{ number_format($item->pengajuan, 0, ',', '.') }}</td>
                    <td class="small-text">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-bold small-text" style="text-align: left !important">Total Pengajuan :
                </td>
                <td colspan="2" class="small-text text-bold">{{ number_format($totalPengajuan2, 0, ',', '.') }}</td>
            </tr>

        </tbody>
    </table>

    <div class="table-header">
        <h5 class="text-bold">Laporan Sarana Prasarana</h5>
    </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="small-text text-bold">No.</th>
                <th class="small-text text-bold">Unsur Biaya</th>
                <th class="small-text text-bold">Tanggal</th>
                <th class="small-text text-bold">Pengajuan</th>
                <th class="small-text text-bold">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($cetakPertanggall3 as $item)
                <tr>
                    <td class="small-text">{{ ++$no }}.</td>
                    <td class="small-text">{{ $item->unsurbiaya }}</td>
                    <td class="small-text">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    {{-- <td class="small-text">{{ $item->pengajuan }}</td> --}}
                    <td class="small-text">{{ number_format($item->pengajuan, 0, ',', '.') }}</td>
                    <td class="small-text">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-bold small-text" style="text-align: left !important">Total Pengajuan :
                </td>
                <td colspan="2" class="small-text text-bold">{{ number_format($totalPengajuan3, 0, ',', '.') }}</td>
            </tr>

        </tbody>
    </table>


    <!-- Footer -->
    <div class="footer">
        <div class="clearfix">
            <div class="float-left">
                <p>Mengetahui :</p>
                <p class="text-bold"> Ketua STMIK MI</p>
                <br><br><br>
                <p class="text-bold"> Dr. Marjito, M.Pd.</p>
                <p>Nik. 95.01.017</p>
            </div>
            <div class="float-right">
                <p>Bandung, {{ date('d-m-Y') }}</p>
                <p class="text-bold">Wakil Ketua II </p>
                <br><br><br>
                <p class="text-bold"> Dr. Rinawati, S.Pd., M.M.</p>
                <p>Nik. 98.01.034</p>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Biaya Kepegawaian</title>
    <style>
        /* Add your CSS styles here */
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
        .tengah{
            font-size: 16px !important;
        }
        h5{
            font-size: 10px !important;
        }
        .tebal {
            border-top: 2px solid #000;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; padding: 0; vertical-align: middle;">
                <img src="{{ public_path('logoo.png') }}" style="margin-left: 40px" alt="Logo" width="70"
                    height="70">
            </td>
            <td class="tengah small-text" style="width: 190%;">
                <div class="center-text">
                    <h2 class="small-text">PEMERINTAH DAERAH PROVINSI JAWA BARAT</h2>
                    <h2 class="small-text">LEMBAGA PERGURUAN TINGGI</h2>
                    {{-- <h2 class="small-text">CABANG DINAS PENDIDIKAN WILAYAH VIII</h2> --}}
                    <h2 class="small-text">STMIK MARDIRA INDONESIA</h2>
                    {{-- <h2 class="small-text">SUMEDANG</h2> --}}
                    <b class="small-text">Alamat : Jl. Soekarno-Hatta No. 211 Leuwipanjang, Situsaeur, Kec. Bojongloa
                        Kidul, Kota Bandung, Jawa Barat 40233 ; Telepon : 0225230382</b>
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
        <h5 class="small-text"><span >Lampiran:</span> <span style="font-weight: normal;">Lembara</span></h5>
        <h5 class="small-text"><span >Peiode:</span> <span style="font-weight: normal;">Tanggal</span></h5>
        <h5 class="small-text"><span >Yang Melaporkan:</span> <span style="font-weight: normal;">Admin Lembaga STMIK Mardira Indonesia</span></h5>
    </div>
    

    <div class="table-header">
        <h5>Laporan Biaya Kepegawaian</h5>
    </div>
</div>
    <table>
        <thead>
            <tr>
                <th class="small-text">No.</th>
                <th class="small-text">Unsur Biaya</th>
                <th class="small-text">Tanggal</th>
                <th class="small-text">Pengajuan</th>
                <th class="small-text">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td class="small-text">{{ ++$no }}</td>
                    <td class="small-text">{{ $item->unsurbiaya }}</td>
                    <td class="small-text">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td class="small-text">{{ $item->pengajuan }}</td>
                    <td class="small-text">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-bold small-text" style="text-align: left !important">Total Pengajuan :
                </td>
                <td colspan="2" class="small-text"><b>{{ number_format($totalpengajuan, 0, ',', '.') }}</b></td>
            </tr>

        </tbody>
    </table>

    <div class="table-header">
        <h5>Laporan Biaya Umum</h5>
    </div>
    <table>
        <thead>
            <tr>
                <th class="small-text">No.</th>
                <th class="small-text">Unsur Biaya</th>
                <th class="small-text">Tanggal</th>
                <th class="small-text">Pengajuan</th>
                <th class="small-text">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($data2 as $item)
                <tr>
                    <td class="small-text">{{ ++$no }}</td>
                    <td class="small-text">{{ $item->unsurbiaya }}</td>
                    <td class="small-text">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td class="small-text">{{ $item->pengajuan }}</td>
                    <td class="small-text">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-bold small-text" style="text-align: left !important">Total Pengajuan :
                </td>
                <td colspan="2" class="small-text"><b>{{ number_format($totalpengajuan, 0, ',', '.') }}</b></td>
            </tr>

        </tbody>
    </table>


     <!-- Footer -->
    <div class="footer">
        <div class="clearfix">
            <div class="float-left">
                <p>Mengetahui :</p>
                <p><b> Ketua STMIK MI</b></p>
                <br><br>
                <p><b> Dr. Marjito, M.Pd.</b></p>
                <p>Nik. 95.01.017</p>
            </div>
            <div class="float-right">
                <p>Bandung, {{ date('d-m-Y') }}</p>
                <p><b>Wakil Ketua II </b></p>
                <br><br>
                <p><b> Dr. Rinawati, S.Pd., M.M.</b></p>
                <p>Nik. 98.01.034</p>
            </div>
        </div>
    </div>
</body>

</html>

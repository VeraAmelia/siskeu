<?php

namespace App\Http\Controllers;

use App\Models\biayaKepegawaianBop;
use App\Models\biayaUmumPengajuanBop;
use App\Models\Jabatan;
use App\Models\biayaSaprasBop;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use Dompdf\Dompdf;
// use Barryvdh\DomPDF\Facade\Pdf;


class laporanBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalPengajuanBiayaKepegawaian = biayaKepegawaianBop::sum('pengajuan');
        $totalPengajuanBiayaUmum = biayaUmumPengajuanBop::sum('pengajuan');
        $totalPengajuanSaPrasarana = biayaSaprasBop::sum('pengajuan');

        $totalpengajuan = $totalPengajuanBiayaKepegawaian + $totalPengajuanBiayaUmum + $totalPengajuanSaPrasarana;
        $search = $request->query('search');

        $bopQuery = biayaKepegawaianBop::query(); // Menggunakan query builder untuk memanggil relasi jabatan
        $biayaUmumQuery = biayaUmumPengajuanBop::query();
        $biayaSaprasBopQuery = biayaSaprasBop::query();



        if ($request->has('search')) {
            $bopQuery->where('unsurbiaya', 'ilike', "%" . $request->query('search') . '%')
                ->orWhere('keterangan', 'ilike', "%" . $request->query('search') . '%')
                ->orderByRaw("CASE
                    WHEN unsurbiaya = 'a. Honorarium Kelas Khusus' THEN 1
                    WHEN unsurbiaya = 'b. Uang Makan dan Transport' THEN 2
                    WHEN unsurbiaya = 'c. BPJS Ketenagakerjaan' THEN 3
                    WHEN unsurbiaya = 'd. BPJS Kesehatan' THEN 4
                    WHEN unsurbiaya = 'e. Biaya Duka/Suka Cita' THEN 5
                    WHEN unsurbiaya = 'f. Biaya Pengembangan SDM' THEN 6
                    ELSE 7 END")
                ->orderBy('updated_at', 'desc');
        } else {
            $bopQuery->orderByRaw("CASE
                WHEN unsurbiaya = 'a. Honorarium Kelas Khusus' THEN 1
                WHEN unsurbiaya = 'b. Uang Makan dan Transport' THEN 2
                WHEN unsurbiaya = 'c. BPJS Ketenagakerjaan' THEN 3
                WHEN unsurbiaya = 'd. BPJS Kesehatan' THEN 4
                WHEN unsurbiaya = 'e. Biaya Duka/Suka Cita' THEN 5
                WHEN unsurbiaya = 'f. Biaya Pengembangan SDM' THEN 6
                ELSE 7 END")
                ->orderBy('updated_at', 'desc');
        }


        if ($request->has('search')) {
            $biayaUmumQuery->where('unsurbiaya', 'ilike', "%" . $request->query('search') . '%')
                ->orWhere('keterangan', 'ilike', "%" . $request->query('search') . '%')
                ->orderByRaw("CASE
                WHEN unsurbiaya = 'a. Rumah Tangga dan Perlengkapan' THEN 1
                WHEN unsurbiaya = 'b. ATK' THEN 2
                WHEN unsurbiaya = 'c. Transportasi' THEN 3
                WHEN unsurbiaya = 'd. Pemeliharaan Gedung/Fasilitas' THEN 4
                WHEN unsurbiaya = 'e. Internet' THEN 5
                WHEN unsurbiaya = 'f. PLN' THEN 6
                WHEN unsurbiaya = 'g. Partisipasi Keamanan dan Kebersihan' THEN 7
                WHEN unsurbiaya = 'h. Pulsa Operasional' THEN 8
                WHEN unsurbiaya = 'i. Token Listrik' THEN 9
                WHEN unsurbiaya = 'j. Telkom' THEN 10
                WHEN unsurbiaya = 'k. Biaya Admin Bank' THEN 11
                ELSE 12 END, 
                CASE
                    WHEN detailbiaya = 'a.1. Konsumsi' THEN 1
                    WHEN detailbiaya = 'a.2. Air Mineral' THEN 2
                    WHEN detailbiaya = 'a.3. Perlengkapan Rumah Tangga (Tisu, Sabun, Kopi, Teh, dll)' THEN 3
                    ELSE 4 END,
                CASE
                    WHEN detailatk = 'b.1. Bussines File' THEN 1
                    WHEN detailatk = 'b.2. Pulpen' THEN 2
                    WHEN detailatk = 'b.3. Ketas A4' THEN 3
                    ELSE 4 END,
                CASE
                    WHEN detailtransportasi = 'c.1. Bensin Mobil STMIK (Transportasi)' THEN 1
                    WHEN detailtransportasi = 'c.2. Parkir (Transportasi)' THEN 2
                    WHEN detailtransportasi = 'c.3. Transport Belanja ART (Transportasi)' THEN 3
                    ELSE 4 END,
                CASE
                    WHEN detailinternet = 'e.1. Paket Internet' THEN 1
                    WHEN detailinternet = 'e.2. Kecepatan Tambahan' THEN 2
                    WHEN detailinternet = 'e.3. Peralatan Jaringan' THEN 3
                    ELSE 4 END,
                CASE
                    WHEN detailkeamanan = 'g.1. Iuran RT' THEN 1
                    WHEN detailkeamanan = 'g.2. Kebersihan UPT' THEN 2
                    WHEN detailkeamanan = 'g.3. Sampah Keliling' THEN 3
                    ELSE 4 END")
                ->orderBy('updated_at', 'desc');
        } else {
            $biayaUmumQuery->orderByRaw(
                "CASE
            WHEN unsurbiaya = 'a. Rumah Tangga dan Perlengkapan' THEN 1
            WHEN unsurbiaya = 'b. ATK' THEN 2
            WHEN unsurbiaya = 'c. Transportasi' THEN 3
            WHEN unsurbiaya = 'd. Pemeliharaan Gedung/Fasilitas' THEN 4
            WHEN unsurbiaya = 'e. Internet' THEN 5
            WHEN unsurbiaya = 'f. PLN' THEN 6
            WHEN unsurbiaya = 'g. Partisipasi Keamanan dan Kebersihan' THEN 7
            WHEN unsurbiaya = 'h. Pulsa Operasional' THEN 8
            WHEN unsurbiaya = 'i. Token Listrik' THEN 9
            WHEN unsurbiaya = 'j. Telkom' THEN 10
            WHEN unsurbiaya = 'k. Biaya Admin Bank' THEN 11
            ELSE 12 END, 
            CASE
                WHEN detailbiaya = 'a.1. Konsumsi' THEN 1
                WHEN detailbiaya = 'a.2. Air Mineral' THEN 2
                WHEN detailbiaya = 'a.3. Perlengkapan Rumah Tangga (Tisu, Sabun, Kopi, Teh, dll)' THEN 3
                ELSE 4 END,
            CASE
                WHEN detailatk = 'b.1. Bussines File' THEN 1
                WHEN detailatk = 'b.2. Pulpen' THEN 2
                WHEN detailatk = 'b.3. Ketas A4' THEN 3
                ELSE 4 END,
            CASE
                WHEN detailtransportasi = 'c.1. Bensin Mobil STMIK (Transportasi)' THEN 1
                WHEN detailtransportasi = 'c.2. Parkir (Transportasi)' THEN 2
                WHEN detailtransportasi = 'c.3. Transport Belanja ART (Transportasi)' THEN 3
                ELSE 4 END,
            CASE
                WHEN detailinternet = 'e.1. Paket Internet' THEN 1
                WHEN detailinternet = 'e.2. Kecepatan Tambahan' THEN 2
                WHEN detailinternet = 'e.3. Peralatan Jaringan' THEN 3
                ELSE 4 END,
                CASE
                    WHEN detailkeamanan = 'g.1. Iuran RT' THEN 1
                    WHEN detailkeamanan = 'g.2. Kebersihan UPT' THEN 2
                    WHEN detailkeamanan = 'g.3. Sampah Keliling' THEN 3
                    ELSE 4 END"
            )
                ->orderBy('updated_at', 'desc');
        }

        if ($request->has('search')) {
            $biayaSaprasBopQuery->where('unsurbiaya', 'ilike', "%" . $request->query('search') . '%')
                ->orWhere('keterangan', 'ilike', "%" . $request->query('search') . '%')
                ->orderByRaw("CASE
                    WHEN unsurbiaya = 'a. Kebutuhan Sewa Gedung Perkuliah Baru' THEN 1
                    WHEN unsurbiaya = 'b. Kebutuhan Kursi Meja Dosen' THEN 2
                    WHEN unsurbiaya = 'c. Kebutuhan Kursi Meja Mahasiswa' THEN 3
                    WHEN unsurbiaya = 'd. Kebutuhan Kursi Meja Rapat' THEN 4
                    WHEN unsurbiaya = 'e. Kebutuhan Kursi Sofa Tamu' THEN 5
                    WHEN unsurbiaya = 'f. Kebutuhan AC' THEN 6
                    WHEN unsurbiaya = 'g. Kebutuhan Laptop' THEN 7
                    WHEN unsurbiaya = 'h. Kebutuhan Desk Computer' THEN 8
                    WHEN unsurbiaya = 'i. Kebutuhan Infocus' THEN 9
                    WHEN unsurbiaya = 'j. Kebutuhan Printer' THEN 10
                    WHEN unsurbiaya = 'k. Kebutuhan Mesin Fotocopy' THEN 11
                    WHEN unsurbiaya = 'l. Kebutuhan CCTV dan Instalasinya' THEN 12
                    WHEN unsurbiaya = 'm. Kebutuhan Instalasi Listrik/Telp/IT' THEN 13
                    WHEN unsurbiaya = 'n. Kebutuhan Kendaraan Roda Empat' THEN 14
                    WHEN unsurbiaya = 'o. Kebutuhan Kendaraan Roda Dua' THEN 15
                    WHEN unsurbiaya = 'p. Pengembangan IT' THEN 16
                    ELSE 17 END")
                ->orderBy('updated_at', 'desc');
        } else {
            $biayaSaprasBopQuery->orderByRaw("CASE
                WHEN unsurbiaya = 'a. Kebutuhan Sewa Gedung Perkuliah Baru' THEN 1
                WHEN unsurbiaya = 'b. Kebutuhan Kursi Meja Dosen' THEN 2
                WHEN unsurbiaya = 'c. Kebutuhan Kursi Meja Mahasiswa' THEN 3
                WHEN unsurbiaya = 'd. Kebutuhan Kursi Meja Rapat' THEN 4
                WHEN unsurbiaya = 'e. Kebutuhan Kursi Sofa Tamu' THEN 5
                WHEN unsurbiaya = 'f. Kebutuhan AC' THEN 6
                WHEN unsurbiaya = 'g. Kebutuhan Laptop' THEN 7
                WHEN unsurbiaya = 'h. Kebutuhan Desk Computer' THEN 8
                WHEN unsurbiaya = 'i. Kebutuhan Infocus' THEN 9
                WHEN unsurbiaya = 'j. Kebutuhan Printer' THEN 10
                WHEN unsurbiaya = 'k. Kebutuhan Mesin Fotocopy' THEN 11
                WHEN unsurbiaya = 'l. Kebutuhan CCTV dan Instalasinya' THEN 12
                WHEN unsurbiaya = 'm. Kebutuhan Instalasi Listrik/Telp/IT' THEN 13
                WHEN unsurbiaya = 'n. Kebutuhan Kendaraan Roda Empat' THEN 14
                WHEN unsurbiaya = 'o. Kebutuhan Kendaraan Roda Dua' THEN 15
                WHEN unsurbiaya = 'p. Pengembangan IT' THEN 16
                ELSE 17 END")
                ->orderBy('updated_at', 'desc');
        }

        // // Dapatkan tahun saat ini secara otomatis
        // $tahun = date('Y');

        // $tanggalAwal = $tahun . '-01-15';
        // $tanggalAkhir = $tahun . '-12-15';

        // // Dapatkan daftar tanggal 15 dalam rentang tahun tersebut
        // $dates = [];
        // $currentDate = $tanggalAwal;
        // while ($currentDate <= $tanggalAkhir) {
        //     $dates[] = $currentDate;
        //     $currentDate = date('Y-m-d', strtotime('+1 month', strtotime($currentDate)));
        // }

        // // Inisialisasi total akumulatif
        // $totalRealisasi = 0;

        // // Iterasi melalui setiap tanggal 15
        // foreach ($dates as $date) {
        //     // Hitung total realisasi untuk tanggal 15 ini dalam masing-masing tabel
        //     $totalRealisasiKepegawaian = biayaKepegawaianBop::whereDate('tanggal', $date)->sum('realisasi');
        //     $totalRealisasiUmum = biayaUmumPengajuanBop::whereDate('tanggal', $date)->sum('realisasi');
        //     $totalRealisasiSapras = biayaSaprasBop::whereDate('tanggal', $date)->sum('realisasi');

        //     // Tambahkan total tanggal 15 ini ke total akumulatif
        //     $totalRealisasi += $totalRealisasiKepegawaian + $totalRealisasiUmum + $totalRealisasiSapras;
        // }

        // Tentukan unsurbiaya yang ingin dihitung
        // Unsur biaya yang ingin dihitung
        $unsurBiaya1 = 'a. Honorarium Kelas Khusus';
        $unsurBiaya2 = 'b. Uang Makan dan Transport';
        $unsurBiaya3 = 'd. BPJS Kesehatan';

        // Inisialisasi total akumulatif
        $totalRealisasiUnsur1 = 0;
        $totalRealisasiUnsur2 = 0;
        $totalRealisasiUnsur3 = 0;

        // Loop dari tanggal 15 bulan awal hingga tanggal 15 bulan akhir
        $tahun = date('Y'); // Ganti dengan tahun yang sesuai
        $tanggalAwal = $tahun . '-01-15'; // Tanggal awal
        $tanggalAkhir = $tahun . '-12-15'; // Tanggal akhir
        $currentDate = $tanggalAwal;

        while ($currentDate <= $tanggalAkhir) {
            // Hitung total realisasi untuk unsur biaya 1 pada tanggal 15 dalam bulan ini
            $realisasiUnsur1 = DB::table('biaya_kepegawaian_bop')
                ->where('unsurbiaya', $unsurBiaya1)
                ->whereDate('tanggal', $currentDate)
                ->sum('realisasi');
            
            // Hitung total realisasi untuk unsur biaya 2 pada tanggal 15 dalam bulan ini
            $realisasiUnsur2 = DB::table('biaya_kepegawaian_bop')
                ->where('unsurbiaya', $unsurBiaya2)
                ->whereDate('tanggal', $currentDate)
                ->sum('realisasi');
            
            // Hitung total realisasi untuk unsur biaya 3 pada tanggal 15 dalam bulan ini
            $realisasiUnsur3 = DB::table('biaya_kepegawaian_bop')
                ->where('unsurbiaya', $unsurBiaya3)
                ->whereDate('tanggal', $currentDate)
                ->sum('realisasi');
            
            // Tambahkan realisasi bulan ini ke total akumulatif
            $totalRealisasiUnsur1 += $realisasiUnsur1;
            $totalRealisasiUnsur2 += $realisasiUnsur2;
            $totalRealisasiUnsur3 += $realisasiUnsur3;
        
            // Tambahkan 1 bulan ke tanggal saat ini
            $currentDate = date('Y-m-d', strtotime('+1 month', strtotime($currentDate)));
        }

        $bop = $bopQuery->get();
        $biayaUmum = $biayaUmumQuery->get();
        $biayaSaprasBop = $biayaSaprasBopQuery->get();

        return view('FullDashboard.bop.LaporanAktivitasBulanan.LaporanAktivitasBulanan', compact('bop', 'biayaUmum', 'biayaSaprasBop', 'totalpengajuan', 'totalRealisasiUnsur1', 'totalRealisasiUnsur2', 'totalRealisasiUnsur3', 'search'));
    }
}

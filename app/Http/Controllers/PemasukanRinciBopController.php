<?php

namespace App\Http\Controllers;

use App\Models\biayaKepegawaianBop;
use App\Models\biayaUmumPengajuanBop;
use App\Models\pemasukanKepegawaian;
use App\Models\pengeluaranBop;
use App\Models\biayaSaprasBop;
use Illuminate\Http\Request;

class PemasukanRinciBopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $sumjumlahusulan = pengeluaranBop::sum('jumlahusulan');
        // $sumjumlahrealisasi = pengeluaranBop::sum('jumlahrealisasi');
        // $sumjumlahsisa = pengeluaranBop::sum('jumlahsisa');
        // $search = $request->query('search'); // Mendapatkan nilai pencarian dari query parameter

        // if ($search) {
        //     $bop = pengeluaranBop::where('uraian', 'ilike', "%" . $search . '%')
        //         ->orWhere('petugas', 'ilike', "%" . $search . '%')
        //         ->orWhere('keterangan', 'ilike', "%" . $search . '%')
        //         ->orderBy('updated_at', 'desc')
        //         ->paginate(5);
        // } else {
        //     $bop = pengeluaranBop::orderBy('updated_at', 'desc')->paginate(5);
        // }
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
                    WHEN detailinternet = 'e.1. Paket Internet' THEN 1
                    WHEN detailinternet = 'e.2. Kecepatan Tambahan' THEN 2
                    WHEN detailinternet = 'e.3. Peralatan Jaringan' THEN 3
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
            WHEN detailinternet = 'e.1. Paket Internet' THEN 1
            WHEN detailinternet = 'e.2. Kecepatan Tambahan' THEN 2
            WHEN detailinternet = 'e.3. Peralatan Jaringan' THEN 3
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

        $bop = $bopQuery->get();
        $biayaUmum = $biayaUmumQuery->get();
        $biayaSaprasBop = $biayaSaprasBopQuery->get();

        return view('FullDashboard.rinciBop.pemasukanRinciBop.pemasukanRinciBop', compact('bop', 'biayaUmum', 'biayaSaprasBop', 'totalpengajuan', 'search'));
    }
}

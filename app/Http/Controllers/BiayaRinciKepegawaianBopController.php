<?php

namespace App\Http\Controllers;

use App\Models\biayaKepegawaianBop;
use App\Models\biayaUmumPengajuanBop;
use App\Models\biayaSaprasBop;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;


class BiayaRinciKepegawaianBopController extends Controller
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

        // $bopQuery = biayaKepegawaianBop::with('jabatan'); // Menggunakan query builder untuk memanggil relasi jabatan
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


        return view('FullDashboard.bop.PemasukanPengajuanBop.PemasukanPengajuanBop', compact('bop', 'biayaUmum', 'biayaSaprasBop', 'totalpengajuan', 'search'));
    }


    public function exportPDF()
    {
        $totalpengajuan = biayaKepegawaianBop::sum('pengajuan');
        $totalpengajuan2 = biayaUmumPengajuanBop::sum('pengajuan');
        $totalpengajuan3 = biayaSaprasBop::sum('pengajuan');

        $data = biayaKepegawaianBop::all();
        $data2 = biayaUmumPengajuanBop::all();
        $data3 = biayaSaprasBop::all();

        $totalpengajuan = biayaKepegawaianBop::sum('pengajuan');

        $pdf = PDF::loadView('FullDashboard.bop.biayaKepegawaian.export-pdf', compact('data', 'data2', 'data3', 'totalpengajuan', 'totalpengajuan2', 'totalpengajuan3'));

        return $pdf->stream('laporan_biaya_kepegawaian.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $jab = Jabatan::all();
        // return view('FullDashboard.bop.biayaKepegawaian.tambahbiayaKepegawaian', compact('jab'));
        return view('FullDashboard.bop.biayaKepegawaianRinci.tambahbiayaKepegawaian');
    }


    public function cetakPegawaiPertanggal($tglawal, $tglakhir)
    {
        $tglawal = Carbon::parse($tglawal)->format('d-m-Y');
        $tglakhir = Carbon::parse($tglakhir)->format('d-m-Y');
        $totalpengajuan2 = biayaUmumPengajuanBop::sum('pengajuan');
        $data2 = biayaUmumPengajuanBop::all();

        // $cetakPertanggall = biayaKepegawaianBop::whereBetween('tanggal', [$tglawal, $tglakhir])->get();
        $cetakPertanggall = BiayaKepegawaianBop::whereBetween('tanggal', [$tglawal, $tglakhir])
            ->orderBy('tanggal', 'asc') // Urutkan berdasarkan tanggal secara menurun (terbaru dulu)
            ->get();
        // $cetakPertanggall = biayaKepegawaianBop::whereBetween('tanggal', [$tglawal, $tglakhir])->get();
        $cetakPertanggall2 = biayaUmumPengajuanBop::whereBetween('tanggal', [$tglawal, $tglakhir])
            ->orderBy('tanggal', 'asc') // Urutkan berdasarkan tanggal secara menurun (terbaru dulu)
            ->get();

        $cetakPertanggall3 = biayaUmumPengajuanBop::whereBetween('tanggal', [$tglawal, $tglakhir])
            ->orderBy('tanggal', 'asc') // Urutkan berdasarkan tanggal secara menurun (terbaru dulu)
            ->get();

        $totalPengajuan = biayaKepegawaianBop::whereBetween('tanggal', [$tglawal, $tglakhir])->sum('pengajuan');
        $totalPengajuan2 = biayaUmumPengajuanBop::whereBetween('tanggal', [$tglawal, $tglakhir])->sum('pengajuan');
        $totalPengajuan3 = biayaUmumPengajuanBop::whereBetween('tanggal', [$tglawal, $tglakhir])->sum('pengajuan');
        // $totalpengajuan = biayaKepegawaianBop::sum('pengajuan');
        $pdf = PDF::loadView('FullDashboard.bop.biayaKepegawaian.cetakPertanggall', compact('cetakPertanggall', 'cetakPertanggall2', 'data2', 'totalPengajuan', 'totalPengajuan2', 'tglawal', 'tglakhir', 'cetakPertanggall3', 'totalPengajuan3'));
        return $pdf->stream('laporanPerTanggal_biaya_kepegawaian.pdf');

        return redirect()->route('cetakPertanggal');
    }


    public function cetakPertanggal()
    {
        return view('FullDashboard.bop.biayaKepegawaian.cetakPertanggal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $pengajuan = $this->parseRupiah($request->input('pengajuan'));
        // $realisasi_pengeluaran = $this->parseRupiah($request->input('realisasi_pengeluaran'));

        // // Calculate sisa_pengeluaran
        // $sisa_pengeluaran = $pengajuan - $realisasi_pengeluaran;

        // // Get the detail biaya value
        // $detailBiaya = $request->input('detailbiaya');
        // $detailinternet = $request->input('detailinternet');

        // // Simpan data ke database untuk tabel biayaKepegawaianBop
        // biayaKepegawaianBop::create([
        //     'unsurbiaya' => $request->input('unsurbiaya'),
        //     'tanggal' => $request->input('tanggal'),
        //     'pengajuan' => $pengajuan,
        //     'realisasi_pengeluaran' => $realisasi_pengeluaran,
        //     'sisa_pengeluaran' => $sisa_pengeluaran,
        //     'keterangan' => $request->input('keterangan'),
        //     'detailbiaya' => $detailBiaya, // Save the detail biaya value
        //     'detailinternet' => $detailinternet, // Save the detail biaya value
        // ]);


        // dd($request->all());
        $data = $request->all();

        // Konversi format rupiah ke integer
        $data['pengajuan'] = (int) str_replace(['Rp', '.', ','], '', $request->pengajuan);
        $data['realisasi'] = (int) str_replace(['Rp', '.', ','], '', $request->realisasi);

        // Hitung jumlahsisa
        $data['sisa'] = $data['pengajuan'] - $data['realisasi'];

        // dd($data);
        biayaKepegawaianBop::create($data);



        return redirect()->route('laporanRinciBop.index')->with('simpan', 'Data Berhasil Di Tambahkan.');
    }

    private function parseRupiah($rupiah)
    {
        return (int) str_replace(['.', 'Rp', ' '], '', $rupiah);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $user = biayaKepegawaianBop::find($id);
        $user = biayaKepegawaianBop::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $bop = biayaKepegawaianBop::findorfail($id);

        // return view('FullDashboard.bop.editBop')->with(compact('bop'));

        // $bop = biayaKepegawaianBop::with('jabatan')->findOrFail($id);
        $bop = biayaKepegawaianBop::findOrFail($id);
        // $jab = Jabatan::all();

        // $biayaUmum = biayaUmumPengajuanBop::findOrFail($id);

        return view('FullDashboard.bop.biayaKepegawaianRinci.editbiayaKepegawaian', compact('bop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // $bop = biayaKepegawaianBop::findorfail($id);

        // $data = $request->all();
        // // Menghilangkan tanda titik dan mengubah format angka menjadi integer
        // $data['pengajuan'] = (int) str_replace('.', '', $request->pengajuan);



        // $bop->update($data);
        // ====================================================================

        $bop = biayaKepegawaianBop::findOrFail($id);

        // Membersihkan format Rupiah menjadi angka tanpa Rp dan titik
        $pengajuan = str_replace(["Rp", "."], "", $request->input('pengajuan'));
        $realisasi = str_replace(["Rp", "."], "", $request->input('realisasi'));

        // Menghitung jumlah sisa
        $sisa = $pengajuan - $realisasi;

        $detailBiaya = $request->input('detailbiaya');
        $detailinternet = $request->input('detailinternet');

        $bop->update([
            'pengajuan' => $pengajuan,
            'realisasi' => $realisasi,
            'sisa' => $sisa,
            'unsurbiaya' => $request->input('unsurbiaya'),
            'tanggal' => $request->input('tanggal'),
            'keterangan' => $request->input('keterangan'),
            'petugas' => $request->input('petugas'),
            'detailbiaya' => $detailBiaya, // Save the detail biaya value
            'detailinternet' => $detailinternet, // Save the detail biaya value
        ]);

        return redirect()->route('laporanRinciBop.index')->with('simpan', 'Data Berhasil Di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $bop = biayaKepegawaianBop::findOrFail($id);

        // $bop->delete();

        biayaKepegawaianBop::where('id', $id)->delete();
        //   return back()->with('success', 'Data Berhasil Di Hapus.');
        return back()->with('hapus', 'Data Berhasil Di Hapus.');

        // return redirect()->route('bop')->with('success', 'Data Berhasil Di Hapus.');
    }
}

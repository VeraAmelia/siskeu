<?php

namespace App\Http\Controllers;

use App\Models\biayaKepegawaianBop;
use App\Models\biayaUmumPengajuanBop;
use App\Models\Jabatan;
use App\Models\pemasukanKepegawaian;
use App\Models\biayaSaprasBop;
use App\Models\saranaPrasaranaBop;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
// use Dompdf\Dompdf;
// use Barryvdh\DomPDF\Facade\Pdf;
class BiayaUmumPengajuanBopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $totalpengajuan = biayaUmumPengajuanBop::sum('pengajuan');
        $search = $request->query('search'); // Mendapatkan nilai pencarian dari query parameter
        $perPage = $request->query('per_page', 5);


        $search = $request->query('search');

        $bopQuery = biayaKepegawaianBop::query();
        $biayaUmumQuery = biayaUmumPengajuanBop::query();
        $biayaSaprasBopQuery = biayaSaprasBop::query();


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
                ELSE 7 END, 
                CASE
                    WHEN detailbiaya = 'a.1. Konsumsi' THEN 1
                    WHEN detailbiaya = 'a.2. Air Mineral' THEN 2
                    WHEN detailbiaya = 'a.3. Perlengkapan Rumah Tangga (Tisu, Sabun, Kopi, Teh, dll)' THEN 3
                    ELSE 4 END")
                ->orderBy('updated_at', 'desc');
        } else {
            $biayaUmumQuery->orderByRaw("CASE
            WHEN unsurbiaya = 'a. Rumah Tangga dan Perlengkapan' THEN 1
                WHEN unsurbiaya = 'b. ATK' THEN 2
                WHEN unsurbiaya = 'c. Transportasi' THEN 3
                WHEN unsurbiaya = 'd. Pemeliharaan Gedung/Fasilitas' THEN 4
                WHEN unsurbiaya = 'e. Internet' THEN 5
                WHEN unsurbiaya = 'f. PLN' THEN 6
                ELSE 7 END, 
                CASE
            WHEN detailbiaya = 'a.1. Konsumsi' THEN 1
            WHEN detailbiaya = 'a.2. Air Mineral' THEN 2
            WHEN detailbiaya = 'a.3. Perlengkapan Rumah Tangga (Tisu, Sabun, Kopi, Teh, dll)' THEN 3
            ELSE 4 END")
                ->orderBy('updated_at', 'desc');
        }

        $bop = $bopQuery->get();
        $biayaUmum = $biayaUmumQuery->get();
        $biayaSaprasBop = $biayaSaprasBopQuery->get();

        return view('FullDashboard.bop.biayaUmumPengajuanBop.biayaUmumPengajuanBop', compact('bop', 'totalpengajuan', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FullDashboard.bop.biayaUmumPengajuanBop.tambahbiayaUmumPengajuanBop');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengajuan = $this->parseRupiah($request->input('pengajuan'));
        $realisasi = $this->parseRupiah($request->input('realisasi'));
        $sisa = $this->parseRupiah($request->input('sisa'));
        $detailBiaya = $request->input('detailbiaya');
        $detailinternet = $request->input('detailinternet');
        $detailatk = $request->input('detailatk');
        $detailtransportasi = $request->input('detailtransportasi');    
        $detailkeamanan = $request->input('detailkeamanan');    

        // // Jika unsur biaya adalah "e. Internet", tetapkan detail biaya sesuai dengan pilihan dari dropdown
        // if ($request->input('unsurbiaya') === 'e. Internet') {
        //     $detailBiaya = $request->input('detailinternet');
        // }

        // Simpan data ke database untuk tabel biayaUmumPengajuanBop
        biayaUmumPengajuanBop::create([
            'unsurbiaya' => $request->input('unsurbiaya'),
            'tanggal' => $request->input('tanggal'),
            'pengajuan' => $pengajuan,
            'realisasi' => $realisasi,
            'sisa' => $sisa,
            'petugas' => $request->input('petugas'),
            'keterangan' => $request->input('keterangan'),
            'detailbiaya' => $detailBiaya, // Save the detail biaya value
            'detailinternet' => $detailinternet, // Save the detail biaya value
            'detailatk' => $detailatk, // Save the detail biaya value
            'detailtransportasi' => $detailtransportasi, // Save the detail biaya value
            'detailkeamanan' => $detailkeamanan, // Save the detail biaya value
        ]);



        return redirect()->route('pengajuanBOP.index')->with('simpan', 'Data Berhasil Di Tambahkan.');
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
        // $user = biayaUmumPengajuanBop::find($id);
        $user = biayaUmumPengajuanBop::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $bop = biayaUmumPengajuanBop::findorfail($id);

        // return view('FullDashboard.bop.editBop')->with(compact('bop'));

        $bop = biayaUmumPengajuanBop::findOrFail($id);

        return view('FullDashboard.bop.biayaUmumPengajuanBop.editbiayaUmumPengajuanBop', compact('bop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $bop = biayaUmumPengajuanBop::findorfail($id);

        $data = $request->all();
        // Menghilangkan tanda titik dan mengubah format angka menjadi integer
        $data['pengajuan'] = (int) str_replace('.', '', $request->pengajuan);


        $bop->update($data);

        return redirect()->route('pengajuanBOP.index')->with('simpan', 'Data Berhasil Di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $bop = biayaUmumPengajuanBop::findOrFail($id);

        // $bop->delete();

        biayaUmumPengajuanBop::where('id', $id)->delete();
        //   return back()->with('success', 'Data Berhasil Di Hapus.');
        return back()->with('hapus', 'Data Berhasil Di Hapus.');

        // return redirect()->route('bop')->with('success', 'Data Berhasil Di Hapus.');
    }
}

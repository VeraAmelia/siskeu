<?php

namespace App\Http\Controllers;

use App\Models\biayaSaprasBop;
use Illuminate\Http\Request;

class BiayaRinciSaprasBopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $totalpengajuan = biayaSaprasBop::sum('pengajuan');
        $search = $request->query('search'); // Mendapatkan nilai pencarian dari query parameter
        $perPage = $request->query('per_page', 5);


        if ($request->has('search')) {
            $bop = biayaSaprasBop::where('unsurbiaya', 'ilike', "%" . $request->query('search') . '%')
                ->orWhere('keterangan', 'ilike', "%" . $request->query('search') . '%')
                ->orderBy('updated_at', 'desc') // Mengurutkan berdasarkan updated_at secara descending
                ->paginate(5);
        } else {
            $bop = biayaSaprasBop::orderBy('updated_at', 'desc')->paginate(5);
        }

        return view('FullDashboard.bop.rinciSaPrasaranaBop.saPrasaranaBop', compact('bop', 'totalpengajuan', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FullDashboard.bop.rinciSaPrasaranaBop.tambahsaPrasaranaBop');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // dd($request->all());
        // $pengajuan = $this->parseRupiah($request->input('pengajuan'));

        // // Simpan data ke database
        // biayaSaprasBop::create([
        //     'unsurbiaya' => $request->input('unsurbiaya'),
        //     'tanggal' => $request->input('tanggal'),
        //     'pengajuan' => $pengajuan,
        //     'keterangan' => $request->input('keterangan'),
        // ]);
         // dd($request->all());
         $data = $request->all();

         // Konversi format rupiah ke integer
         $data['pengajuan'] = (int) str_replace(['Rp', '.', ','], '', $request->pengajuan);
         $data['realisasi'] = (int) str_replace(['Rp', '.', ','], '', $request->realisasi);
 
         // Hitung jumlahsisa
         $data['sisa'] = $data['pengajuan'] - $data['realisasi'];
 
        //  dd($data);
         biayaSaprasBop::create($data);

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
        // $user = biayaSaprasBop::find($id);
        $user = biayaSaprasBop::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $bop = biayaSaprasBop::findorfail($id);

        // return view('FullDashboard.bop.editBop')->with(compact('bop'));

        $bop = biayaSaprasBop::findOrFail($id);

        return view('FullDashboard.bop.rinciSaPrasaranaBop.editsaPrasaranaBop', compact('bop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $bop = biayaSaprasBop::findOrFail($id);

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
            'petugas' => $request->input('petugas'),
            'keterangan' => $request->input('keterangan'),
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
        // $bop = biayaSaprasBop::findOrFail($id);

        // $bop->delete();

        biayaSaprasBop::where('id', $id)->delete();
        //   return back()->with('success', 'Data Berhasil Di Hapus.');
        return back()->with('hapus', 'Data Berhasil Di Hapus.');

        // return redirect()->route('bop')->with('success', 'Data Berhasil Di Hapus.');
    }
}

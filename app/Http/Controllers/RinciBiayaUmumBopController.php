<?php

namespace App\Http\Controllers;

use App\Models\biayaSaprasBop;
use App\Models\biayaUmumPengajuanBop;
use Illuminate\Http\Request;

class RinciBiayaUmumBopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $totalpengajuan = biayaUmumPengajuanBop::sum('pengajuan');
        $search = $request->query('search'); // Mendapatkan nilai pencarian dari query parameter
        $perPage = $request->query('per_page', 5);


        if ($request->has('search')) {
            $bop = biayaUmumPengajuanBop::where('unsurbiaya', 'ilike', "%" . $request->query('search') . '%')
                ->orWhere('keterangan', 'ilike', "%" . $request->query('search') . '%')
                ->orderBy('updated_at', 'desc') // Mengurutkan berdasarkan updated_at secara descending
                ->paginate(5);
        } else {
            $bop = biayaUmumPengajuanBop::orderBy('updated_at', 'desc')->paginate(5);
        }

        return view('FullDashboard.bop.rinciBiayaUmumBop.biayaUmumPengajuanBop', compact('bop', 'totalpengajuan', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FullDashboard.bop.rinciBiayaUmumBop.tambahbiayaUmumPengajuanBop');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // dd($request->all());
        // $pengajuan = $this->parseRupiah($request->input('pengajuan'));

        // // Simpan data ke database
        // biayaUmumPengajuanBop::create([
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
         biayaUmumPengajuanBop::create($data);

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

        return view('FullDashboard.bop.rinciBiayaUmumBop.editbiayaUmumPengajuanBop', compact('bop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $bop = biayaUmumPengajuanBop::findOrFail($id);

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
        // $bop = biayaUmumPengajuanBop::findOrFail($id);

        // $bop->delete();

        biayaUmumPengajuanBop::where('id', $id)->delete();
        //   return back()->with('success', 'Data Berhasil Di Hapus.');
        return back()->with('hapus', 'Data Berhasil Di Hapus.');

        // return redirect()->route('bop')->with('success', 'Data Berhasil Di Hapus.');
    }
}

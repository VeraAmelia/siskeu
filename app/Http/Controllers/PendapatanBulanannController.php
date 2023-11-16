<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\pendapatanBulanann;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PendapatanBulanannController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $totalgrandtotal = pendapatanBulanann::sum('grandtotal');
        $search = $request->query('search'); // Mendapatkan nilai pencarian dari query parameter


        if ($request->has('search')) {
            $bop = pendapatanBulanann::where('nama_perkiraan', 'ilike', "%" . $request->query('search') . '%')
                ->orderBy('updated_at', 'desc') // Mengurutkan berdasarkan updated_at secara descending
                ->paginate(10);
        } else {
            $bop = pendapatanBulanann::orderBy('updated_at', 'desc')->paginate(10);
        }

        return view('FullDashboard.laporanBulanan.pendapatan.pendapatanBulanan', compact('bop', 'totalgrandtotal', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FullDashboard.laporanBulanan.pendapatan.tambahPendapatanBulanan');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    //     $grandtotal = $this->parseRupiah($request->input('grandtotal'));



    //     PendapatanBulanan::create([
    //         'nama_perkiraan' => $request->input('nama_perkiraan'),
    //         'grandtotal' => $grandtotal,
    //         'tanggal' => $request->input('tanggal'),
    //     ]);

    //     return redirect()->route('pendapatanBulanan.index')->with('simpan', 'Data Berhasil Di Tambahkan.');
    // }

    public function store(Request $request)
    {
        $grandtotal = $this->parseRupiah($request->input('grandtotal'));
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        pendapatanBulanann::create([
            'nama_perkiraan' => $request->input('nama_perkiraan'),
            'grandtotal' => $grandtotal,
            'tanggal_awal' => $tanggalAwal,
            'tanggal_akhir' => $tanggalAkhir,
        ]);

        return redirect()->route('pendapatanBulanan.index')->with('simpan', 'Data Berhasil Di Tambahkan.');
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
        // $user = pendapatanBulanan::find($id);
        $user = pendapatanBulanann::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $bop = pendapatanBulanan::findorfail($id);

        // return view('FullDashboard.bop.editBop')->with(compact('bop'));

        $bop = pendapatanBulanann::findOrFail($id);

        return view('FullDashboard.laporanBulanan.pendapatan.editPendapatanBulanan', compact('bop'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $bop = PendapatanBulanann::findOrFail($id);

    //     $data = $request->all();

    //     // Menghilangkan tanda titik dan mengubah format angka menjadi integer
    //     $data['grandtotal'] = (int) str_replace('.', '', $request->grandtotal);

    //     // Update nama_perkiraan jika terdapat perubahan
    //     $bop->nama_perkiraan = $request->input('nama_perkiraan');

    //     // Update tanggal_awal dan tanggal_akhir
    //     $tanggalAwal = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_awal'))->format('Y-m-d');
    //     $tanggalAkhir = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_akhir'))->format('Y-m-d');
    //     $bop->tanggal_awal = $tanggalAwal;
    //     $bop->tanggal_akhir = $tanggalAkhir;

    //     // Update grandtotal
    //     $bop->grandtotal = $data['grandtotal'];

    //     $bop->save();

    //     return redirect()->route('pendapatanBulanan.index')->with('simpan', 'Data Berhasil Di Edit.');
    // }

    public function update(Request $request, $id)
    {
        $bop = PendapatanBulanann::findOrFail($id);

        // Convert grandtotal to integer
        $grandtotal = (int) filter_var($request->input('grandtotal'), FILTER_SANITIZE_NUMBER_INT);

        // Update data
        $bop->nama_perkiraan = $request->input('nama_perkiraan');
        $bop->grandtotal = $grandtotal;
        $bop->tanggal_awal = $request->input('tanggal_awal');  // No parsing, directly assign the value
        $bop->tanggal_akhir = $request->input('tanggal_akhir'); // No parsing, directly assign the value

        $bop->save();

        return redirect()->route('pendapatanBulanan.index')->with('simpan', 'Data Berhasil Di Edit.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pendapatanBulanann::where('id', $id)->delete();

        return back()->with('hapus', 'Data Berhasil Di Hapus.');
    }
}

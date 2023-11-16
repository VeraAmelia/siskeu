<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanRinciBopController extends Controller
{
    public function index()
    {
        return view('FullDashboard.laporan.laporanRinciBop.laporanRinciBop');
    }
}

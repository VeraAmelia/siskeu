<?php

namespace App\Charts;

use App\Models\biayaKepegawaianBop;
use App\Models\biayaSaprasBop;
use App\Models\biayaUmumPengajuanBop;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class realisasiBulananPieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahunAnggaran = date('Y');

        $totalPengajuanBiayaKepegawaian = biayaKepegawaianBop::sum('pengajuan');
        $totalPengajuanBiayaUmum = biayaUmumPengajuanBop::sum('pengajuan');
        $totalPengajuanSaPrasarana = biayaSaprasBop::sum('pengajuan');

        $totalRealisasiBiayaKepegawaian = biayaKepegawaianBop::sum('realisasi');
        $totalRealisasiBiayaUmum = biayaUmumPengajuanBop::sum('realisasi');
        $totalRealisasiSaPrasarana = biayaSaprasBop::sum('realisasi');

        $totalpengajuan = $totalPengajuanBiayaKepegawaian + $totalPengajuanBiayaUmum + $totalPengajuanSaPrasarana;
        $totalrealisasi = $totalRealisasiBiayaKepegawaian + $totalRealisasiBiayaUmum + $totalRealisasiSaPrasarana;
        $totalsisa = $totalpengajuan - $totalrealisasi;

        return $this->chart->barChart()
        ->setTitle('Diagram Total Pemasukan, Realisasi, dan Sisa')
        ->setSubtitle('Tahun Anggaran ' . $tahunAnggaran)
       ->addData('Physical sales', [$totalpengajuan, $totalrealisasi, $totalsisa])
        ->setHeight(278)
        // ->setWidth(278)
        // ->setColors(['orange'])
        ->setColors(['#f58742', '#ff6384'])
        ->setXAxis(['Total Pengajuan', 'Total Realisasi', 'Total Sisa']);
    }
}

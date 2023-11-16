<?php

namespace App\Charts;

use App\Models\biayaKepegawaianBop;
use App\Models\biayaSaprasBop;
use App\Models\biayaUmumPengajuanBop;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class realisasiBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $totalPengajuanBiayaKepegawaian = biayaKepegawaianBop::sum('pengajuan');
        $totalPengajuanBiayaUmum = biayaUmumPengajuanBop::sum('pengajuan');
        $totalPengajuanSaPrasarana = biayaSaprasBop::sum('pengajuan');

        $totalRealisasiBiayaKepegawaian = biayaKepegawaianBop::sum('realisasi');
        $totalRealisasiBiayaUmum = biayaUmumPengajuanBop::sum('realisasi');
        $totalRealisasiSaPrasarana = biayaSaprasBop::sum('realisasi');

        $totalpengajuan = $totalPengajuanBiayaKepegawaian + $totalPengajuanBiayaUmum + $totalPengajuanSaPrasarana;
        $totalrealisasi = $totalRealisasiBiayaKepegawaian + $totalRealisasiBiayaUmum + $totalRealisasiSaPrasarana;
        $totalsisa = $totalpengajuan - $totalrealisasi;

        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Physical sales', [$totalpengajuan, $totalrealisasi, $totalsisa]) // Menggunakan $totalpengajuan dalam array
            // ->addData('Digital sales', [$totalrealisasi])
            ->setXAxis(['Total Pengajuan', 'Total Realisasi', 'Total Sisa']);

           
    }
}

<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\LogKegiatan;
use App\Models\Kegiatan;

class NilaiKegiatanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        // $kegiatan = Kegiatan::all();
        // $logkegiatan = LogKegiatan::all();
        $kegiatan = Kegiatan::where('inisiator', auth()->user()->nama)->get();
        $logkegiatan = LogKegiatan::where('inisiator', auth()->user()->nama)->get();
        $allkegiatan = $kegiatan->merge($logkegiatan);

        $nilai = $allkegiatan->sum('nilai');
        // $average = $nilai / $allkegiatan->count();

        $data = [
            $allkegiatan->where('nilai', 0)->count(),
            $allkegiatan->where('nilai', 1)->count(),
            $allkegiatan->where('nilai', 2)->count(),
            $allkegiatan->where('nilai', 3)->count(),
            $allkegiatan->where('nilai', 4)->count(),
            $allkegiatan->where('nilai', 5)->count(),
        ];

        $label = [
            'Belum Dinilai',
            'Sangat Buruk',
            'Buruk',
            'Cukup',
            'Baik',
            'Sangat Baik',
        ];

        $color = [
            '#FF1F00',
            '#FF4D00',
            '#FD6A00',
            '#FD7D00',
            '#FC9E01',
            '#FEC971',
        ];

        return $this->chart->radialChart()
            ->setTitle('Nilai Kinerjamu!')
            ->setSubtitle('Tetap Semangat, Kamu Bisa!')
            ->addData($data)
            ->setHeight(320)
            ->setLabels($label)
            ->setColors($color);
    }
}

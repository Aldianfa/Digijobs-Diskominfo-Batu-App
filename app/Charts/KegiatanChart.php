<?php

namespace App\Charts;

use App\Models\LogKegiatan;
use App\Models\Kegiatan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KegiatanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        //kegiatan and logkegiatan chart in every bidangkegiatan
        $kegiatan = Kegiatan::all();
        $logkegiatan = LogKegiatan::all();
        $allkegiatan = $kegiatan->merge($logkegiatan);
        // $allkegiatan = $kegiatan->union($logkegiatan);

        // $kegiatanbidang = Kegiatan::select('id_bidang_kegiatan')->get();
        // $logbidang = LogKegiatan::select('id_bidang_kegiatan')->get();
        // $allbidang = $kegiatanbidang->union($logbidang);
        

        $data = [
            $allkegiatan->where('id_bidang_kegiatan', 1)->count(),
            $allkegiatan->where('id_bidang_kegiatan', 2)->count(),
            $allkegiatan->where('id_bidang_kegiatan', 3)->count(),
            $allkegiatan->where('id_bidang_kegiatan', 4)->count(),
            $allkegiatan->where('id_bidang_kegiatan', 5)->count(),
            $allkegiatan->where('id_bidang_kegiatan', 6)->count(),
        ];

        // $data = [
        //     $allbidang->where('id_bidang_kegiatan', 1)->count(),
        //     $allbidang->where('id_bidang_kegiatan', 2)->count(),
        //     $allbidang->where('id_bidang_kegiatan', 3)->count(),
        //     $allbidang->where('id_bidang_kegiatan', 4)->count(),
        //     $allbidang->where('id_bidang_kegiatan', 5)->count(),
        //     $allbidang->where('id_bidang_kegiatan', 6)->count(),`
        // ];

        $label = [
            // 'Kepala Dinas',
            'Sekretariat',
            'Sub Bagian Umum dan Kepegawaian',
            'Bidang Informasi dan Komunikasi Publik',
            'Bidang Aplikasi Informatika dan Persandian',
            'Bidang Data dan Statistik',
            'Bidang Jaringan Infrastruktur Teknologi Informasi'
        ];

        return $this->chart->donutChart()
            ->setTitle('Kegiatan Pegawai Per-Bidang')
            ->setSubtitle(date('Y'))
            //set size
            ->setHeight(700)
            ->setWidth(700)
            ->addData($data)
            ->setLabels($label);
    }
}

<?php

namespace App\Charts;

use App\Models\LogKegiatan;
use App\Models\Kegiatan;
use App\Models\Jabatan;
use App\Models\NewUser;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KegiatanStaffChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $idjabatan = auth()->user()->id_jabatan;
        // $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->value('id_jabatan');
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        //var namastaff is nama berdasarkan $listuser
        $namastaff = NewUser::whereIn('id_jabatan', $listJabatan)->pluck('nama');

        //menampilkan kegiatan dengan inisiator sama dengan $namastaff
        $kegiatan = Kegiatan::whereIn('inisiator', $namastaff)->get();
        $logkegiatan = LogKegiatan::whereIn('inisiator', $namastaff)->get();

        $allkegiatanstaff = $kegiatan->merge($logkegiatan);

        $data = [];
        foreach ($namastaff as $staffName) {
        $count = $allkegiatanstaff->where('inisiator', $staffName)->count();
        // $data[] = ['nama' => $staffName, 'count' => $count];
        $data[] = $count;
        }

        // dd($data);

        $label = $namastaff->toArray();


        return $this->chart->donutChart()
            ->setTitle('Controlling Kinerja Staff')
            ->setSubtitle('Dinas Komunikasi dan Informatika Kota Batu 2023')
            ->addData($data, 'count', $label)
            ->setLabels($label);
            // ->setXAxis('nama');
    }
}

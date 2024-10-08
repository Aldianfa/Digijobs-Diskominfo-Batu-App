<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BidangKegiatan;

class DummyBidangKegiatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidangkegiatanData = [
            [
                'id_sub_bagian' => '1',
                // 'nama_bidang_kegiatan' => 'Kepala Dinas',
                'id' => '2'
            ],
            [
                'id_sub_bagian' => '2',
                // 'nama_bidang_kegiatan' => 'Sekretariat',
                'id' => '3'
            ],
            [
                'id_sub_bagian' => '3',
                // 'nama_bidang_kegiatan' => 'Sub Bagian Umum dan Kepegawaian',
                'id' => '4'
            ],
            [
                'id_sub_bagian' => '4',
                // 'nama_bidang_kegiatan' => 'Bidang Informasi dan Komunikasi Publik',
                'id' => '5'
            ],
            [
                'id_sub_bagian' => '5',
                // 'nama_bidang_kegiatan' => 'Bidang Aplikasi Informatika dan Persandian',
                'id' => '7'
            ],
            [
                'id_sub_bagian' => '6',
                // 'nama_bidang_kegiatan' => 'Bidang Data dan Statistik',
                'id' => '6'
            ],
            [
                'id_sub_bagian' => '7',
                // 'nama_bidang_kegiatan' => 'Bidang Jaringan Infrastruktur Teknologi Informasi',
                'id' => '8' 
            ]
        ];

        foreach ($bidangkegiatanData as $key => $value) {
            BidangKegiatan::create($value);
        }
    }
}

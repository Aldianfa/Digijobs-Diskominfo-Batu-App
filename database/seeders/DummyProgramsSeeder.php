<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class DummyProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programData = [
            [
                
                'id_urusan' => '2',
                'nama_program' => 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '2',
                'nama_program' => 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '2',
                'nama_program' => 'Administrasi Keuangan Perangkat Daerah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '2',
                'nama_program' => 'Administrasi Kepegawaian Perangkat Daerah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '2',
                'nama_program' => 'Administrasi Umum Perangkat Daerah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '2',
                'nama_program' => 'Pengadaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '2',
                'nama_program' => 'Penyediaan Jasa Penunjang Urusan Pemerintahan Daerah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '2',
                'nama_program' => 'Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'URUSAN PEMERINTAHAN BIDANG KOMUNIKASI DAN INFORMATIKA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'PROGRAM PENGELOLAAN INFORMASI DAN KOMUNIKASI PUBLIK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'Pengelolaan Informasi dan Komunikasi Publik Pemerintah Daerah Kabupaten/Kota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'PROGRAM PENGELOLAAN APLIKASI INFORMATIKA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'Pengelolaan Nama Domain yang Telah Ditetapkan oleh Pemerintah Pusat dan Sub Domain di Lingkup Pemerintah Daerah Kabupaten/Kota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'Pengelolaan E-government di Lingkup Pemerintah Daerah Kabupaten/Kota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'URUSAN PEMERINTAHAN BIDANG STATISTIK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'PROGRAM PENYELENGGARAAN STATISTIK SEKTORAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'Penyelenggaraan Statistik Sektoral di Lingkup Daerah Kabupaten/Kota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_urusan' => '1',
                'nama_program' => 'URUSAN PEMERINTAHAN BIDANG PERSANDIAN',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                
                'id_urusan' => '1',
                'nama_program' => 'PROGRAM PENYELENGGARAAN PERSANDIAN UNTUK PENGAMANAN INFORMASI',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                
                'id_urusan' => '1',
                'nama_program' => 'Penyelenggaraan Persandian untuk Pengamanan Informasi Pemerintah Daerah Kabupaten/Kota',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($programData as $key => $val) {
            Program::create($val);
        }
    }
}

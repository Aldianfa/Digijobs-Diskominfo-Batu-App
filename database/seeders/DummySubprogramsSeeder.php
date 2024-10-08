<?php

namespace Database\Seeders;

use App\Models\SubProgram;
use Illuminate\Database\Seeder;

class DummySubprogramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subPrograms = [
            [
                'id_sub_program' => '1',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1',
                'nama_sub_program' => 'Pengelolaan Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '2',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.2',
                'nama_sub_program' => 'Pengelolaan Komunikasi Publik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '3',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.3',
                'nama_sub_program' => 'Pelaksanaan Kemitraan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '4',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.1',
                'nama_sub_program' => 'Pengelolaan Data Informasi bidang informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '5',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.2',
                'nama_sub_program' => 'Pelaksanaan Pengelolaan Dokumentasi Kegiatan Pemerintahan, Pembangunan dan Pelayanan Masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '6',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.3',
                'nama_sub_program' => 'Pelaksanaan Pelayanan Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '7',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.4',
                'nama_sub_program' => 'Pelaksanaan Pengelolaan Pengaduan, Opini, dan Aspirasi Masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '8',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.5',
                'nama_sub_program' => 'Pelaksanaan Pembinaan Pejabat Pengelolaan Informasi dan Dokumentasi (PPID) SKPD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '9',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.6',
                'nama_sub_program' => 'Pelaksanaan Pengelolaan Basis Data',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '10',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.7',
                'nama_sub_program' => 'Pengelolaan Informasi Melalui Website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '11',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.8',
                'nama_sub_program' => 'Pelaksanaan Pengelolaan Informasi Pendukung Kebijakan Nasional',
            ],
            [
                'id_sub_program' => '12',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.9',
                'nama_sub_program' => 'Pelaksanaan Kebijakan Hubungan Kerja Sama dengan lembaga lain',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_program' => '13',
                'id_program' => '1',
                'kode_sub_program' => 'P.21.1.1.10',
                'nama_sub_program' => 'Pembinaan dan Koordinasi Bidang Sosial Media',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // foreach ($subPrograms as $key => $val) {
        //     SubProgram::create($val);
        // }
    }
}

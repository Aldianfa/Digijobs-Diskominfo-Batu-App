<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class DummyJabatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatansData = [
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Kepala Dinas Kominfo Batu',
                'id_sub_bagian' => 1,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Sekretaris Dinas Kominfo Batu',
                'id_sub_bagian' => 1,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Kepala Sub Bagian Umum dan Kepegawaian',
                'id_sub_bagian' => 2,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Kepala Bagian Informasi dan Komunikasi Publik',
                'id_sub_bagian' => 1,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Kepala Bagian Pengelolaan Data dan Statistik',
                'id_sub_bagian' => 1,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Kepala Bagian Aplikasi Informasi dan Komunikasi',
                'id_sub_bagian' => 1,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Kepala Sub Bagian Jaringan',
                'id_sub_bagian' => 7,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Analisis Keuangan Pusat dan Daerah Ahli Muda',
                'id_sub_bagian' => 2,
            ],
            [
                'jenis_jabatan' => 'Struktural',
                'nama_jabatan' => 'Perencana Ahli Muda',
                'id_sub_bagian' => 2,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pengolah Data Laporan Keuangan',
                'id_sub_bagian' => 2,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Penyusun Program Anggaran dan Pelaporan',
                'id_sub_bagian' => 2,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Penyusun Rencana Kebutuhan Sarana dan Prasana',
                'id_sub_bagian' => 3,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pengelola Kepegawaian',
                'id_sub_bagian' => 3,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pengelola Surat',
                'id_sub_bagian' => 3,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pranata Humas Ahli Muda',
                'id_sub_bagian' => 4,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pranata Humas',
                'id_sub_bagian' => 4,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pranata Humas Muda',
                'id_sub_bagian' => 4,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Analisis Kebijakan Ahli Muda',
                'id_sub_bagian' => 5,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Analisis Kebijakan',
                'id_sub_bagian' => 5,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pranata Komputer Pertama',
                'id_sub_bagian' => 5,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Analisis Kebijakan Ahli Muda',
                'id_sub_bagian' => 6,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pranata Komputer Ahli Muda',
                'id_sub_bagian' => 6,
            ],
            [
                'jenis_jabatan' => 'Fungsional',
                'nama_jabatan' => 'Pranata Komputer Pertama',
                'id_sub_bagian' => 6,
            ]
            
        ];

        foreach ($jabatansData as $key => $val) {
            Jabatan::create($val);
        }
    }
}

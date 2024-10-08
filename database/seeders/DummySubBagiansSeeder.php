<?php

namespace Database\Seeders;

use App\Models\SubBagian;
use Illuminate\Database\Seeder;

class DummySubBagiansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subbagianData = [
            [
                'id_sub_bagian' => '1',
                'id_bagian' => '1',
                'nama_sub_bagian' => 'Kepala Dinas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_bagian' => '2',
                'id_bagian' => '2',
                'nama_sub_bagian' => 'Sekretaris',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_bagian' => '3',
                'id_bagian' => '2',
                'nama_sub_bagian' => 'Struktural dan Fungsional Sub Bagian Umum dan Kepegawaian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_bagian' => '4',
                'id_bagian' => '3',
                'nama_sub_bagian' => 'Struktural dan Fungsional Bagian Informasi dan Komunikasi Publik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_bagian' => '5',
                'id_bagian' => '4',
                'nama_sub_bagian' => 'Struktural dan Fungsional Bagian Data dan Statistik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_bagian' => '6',
                'id_bagian' => '5',
                'nama_sub_bagian' => 'Struktural dan Fungsional Bagian Aplikasi Informatika dan Persandian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_bagian' => '7',
                'id_bagian' => '5',
                'nama_sub_bagian' => 'Struktural dan Fungsional Sub Bagian Jaringan Infrastruktur Teknologi Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            
        ];

        foreach ($subbagianData as $key => $val) {
            SubBagian::create($val);
        }
    }
}

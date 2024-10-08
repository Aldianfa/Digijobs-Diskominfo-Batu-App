<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummySkpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void_skpd
     */
    public function run()
    {
        $skpdData = [
            [
                'id_skpd' => 1,
                'nama_skpd' => 'Dinas Pendidikan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 2,
                'nama_skpd' => 'Dinas Kesehatan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 3,
                'nama_skpd' => 'Dinas Pekerjaan Umum',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 4,
                'nama_skpd' => 'Dinas Perhubungan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 5,
                'nama_skpd' => 'Dinas Perikanan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 6,
                'nama_skpd' => 'Dinas Perdagangan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 7,
                'nama_skpd' => 'Dinas Perpustakaan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 8,
                'nama_skpd' => 'Dinas Kebudayaan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 9,
                'nama_skpd' => 'Dinas Pariwisata',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 10,
                'nama_skpd' => 'Dinas Sosial',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 11,
                'nama_skpd' => 'Dinas Pemberdayaan Masyarakat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_skpd' => 12,
                'nama_skpd' => 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($skpdData as $skpd) {
            \App\Models\Skpd::create($skpd);
        }
    }
}

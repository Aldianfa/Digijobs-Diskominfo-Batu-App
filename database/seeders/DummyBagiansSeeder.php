<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Seeder;

class DummyBagiansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bagiansData = [
            [
                'id_bagian' => '1',
                'nama_bagian' => 'Kepala Dinas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bagian' => '2',
                'nama_bagian' => 'Sekretariat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bagian' => '3',
                'nama_bagian' => 'Informasi dan Komunikasi Publik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bagian' => '4',
                'nama_bagian' => 'Data dan Statistik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bagian' => '5',
                'nama_bagian' => 'Aplikasi Informatika dan Persandian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($bagiansData as $key => $val) {
            Bagian::create($val);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummyKlasifikasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $klasifikasiData = [
            [
                'id_klasifikasi' => '1',
                'kode_klasifikasi' => '000',
                'nama_klasifikasi' => 'Umum',
            ],
            [
                'id_klasifikasi' => '2',
                'kode_klasifikasi' => '001',
                'nama_klasifikasi' => 'Lambang',
            ],
            [
                'id_klasifikasi' => '3',
                'kode_klasifikasi' => '002',
                'nama_klasifikasi' => 'Tanda Kehormatan',
            ],
            [
                'id_klasifikasi' => '4',
                'kode_klasifikasi' => '003',
                'nama_klasifikasi' => 'Hari Raya/Besar',
            ],
        ];

        foreach ($klasifikasiData as $klasifikasi) {
            \App\Models\Klasifikasi::create($klasifikasi);
        }
    }
}

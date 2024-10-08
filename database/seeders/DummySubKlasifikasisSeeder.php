<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummySubKlasifikasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subklasifikasiData =[
            [
                'id_sub_klasifikasi' => '1',
                'id_klasifikasi' => '1',
                'kode_sub_klasifikasi' => '.1',
                'nama_sub_klasifikasi' => 'Garuda',
            ],
            [
                'id_sub_klasifikasi' => '2',
                'id_klasifikasi' => '1',
                'kode_sub_klasifikasi' => '.2',
                'nama_sub_klasifikasi' => 'Bendera Kebangsaan',
            ],
            [
                'id_sub_klasifikasi' => '3',
                'id_klasifikasi' => '1',
                'kode_sub_klasifikasi' => '.3',
                'nama_sub_klasifikasi' => 'Daerah',
            ],
            [
                'id_sub_klasifikasi' => '4',
                'id_klasifikasi' => '1',
                'kode_sub_klasifikasi' => '.31',
                'nama_sub_klasifikasi' => 'Daerah Tingkat I/Provinsi',
            ],
            [
                'id_sub_klasifikasi' => '5',
                'id_klasifikasi' => '1',
                'kode_sub_klasifikasi' => '.32',
                'nama_sub_klasifikasi' => 'Daerah Tingkat II/Kabupaten',
            ],
            [
                'id_sub_klasifikasi' => '6',
                'id_klasifikasi' => '2',
                'kode_sub_klasifikasi' => '.1',
                'nama_sub_klasifikasi' => 'Bintangdoku',
            ],
            [
                'id_sub_klasifikasi' => '7',
                'id_klasifikasi' => '2',
                'kode_sub_klasifikasi' => '.2',
                'nama_sub_klasifikasi' => 'Satyalancana',
            ],
            [
                'id_sub_klasifikasi' => '8',
                'id_klasifikasi' => '2',
                'kode_sub_klasifikasi' => '.3',
                'nama_sub_klasifikasi' => 'Samkarya Nugraha',
            ],
            [
                'id_sub_klasifikasi' => '9',
                'id_klasifikasi' => '2',
                'kode_sub_klasifikasi' => '.4',
                'nama_sub_klasifikasi' => 'Monumen',
            ],
            [
                'id_sub_klasifikasi' => '10',
                'id_klasifikasi' => '2',
                'kode_sub_klasifikasi' => '.5',
                'nama_sub_klasifikasi' => 'Penghargaan Secara Adat',
            ],
            [
                'id_sub_klasifikasi' => '11',
                'id_klasifikasi' => '2',
                'kode_sub_klasifikasi' => '.6',
                'nama_sub_klasifikasi' => 'Penghargaan Lainnya',
            ],
            [
                'id_sub_klasifikasi' => '12',
                'id_klasifikasi' => '3',
                'kode_sub_klasifikasi' => '.1',
                'nama_sub_klasifikasi' => 'Nasional, Hari Pahlawan dsb',
            ],
            [
                'id_sub_klasifikasi' => '13',
                'id_klasifikasi' => '3',
                'kode_sub_klasifikasi' => '.2',
                'nama_sub_klasifikasi' => 'Keagamaan - Idul Fitri',
            ],
            [
                'id_sub_klasifikasi' => '14',
                'id_klasifikasi' => '3',
                'kode_sub_klasifikasi' => '.3',
                'nama_sub_klasifikasi' => 'Hari Ulang Tahun (HUT)',
            ],
            [
                'id_sub_klasifikasi' => '15',
                'id_klasifikasi' => '3',
                'kode_sub_klasifikasi' => '.4',
                'nama_sub_klasifikasi' => 'Hari Besar Internasional',    
            ],

        ];

        foreach ($subklasifikasiData as $subklasifikasi) {
            \App\Models\SubKlasifikasi::create($subklasifikasi);
        }
    }
}

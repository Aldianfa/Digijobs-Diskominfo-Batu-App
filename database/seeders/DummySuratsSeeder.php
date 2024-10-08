<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Seeder;

class DummySuratsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suratData = [
            [
                'id_surat' => '1',
                'id_sub_klasifikasi' => '1',
                'id' => '1',
                'tanggal_terima' => '2021-07-31',
                'perihal' => 'Pengajuan Proposal',
                'file_surat' => '',
            ],
            ];

        // foreach ($suratData as $key => $value) {
        //    Surat::create($value);
        // }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Urusan;
use Illuminate\Database\Seeder;

class DummyUrusansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urusansData = [
            [
                'id_urusan' => '1',
                'nama_urusan' => 'Utama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_urusan' => '2',
                'nama_urusan' => 'Manajerial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_urusan' => '3',
                'nama_urusan' => 'Pendukung',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($urusansData as $key => $val) {
            Urusan::create($val);
        }
    }
}

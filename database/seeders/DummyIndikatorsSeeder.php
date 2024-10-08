<?php

namespace Database\Seeders;

use App\Models\Indikator;
use Illuminate\Database\Seeder;

class DummyIndikatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indikatorData = [
            [
                
                'id_program' => '2',
                'nama_indikator' => 'Jumlah Perkara yang Diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_program' => '2',
                'nama_indikator' => 'Jumlah Perkara yang Diputus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_program' => '2',
                'nama_indikator' => 'Jumlah Perkara yang Dikembalikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_program' => '2',
                'nama_indikator' => 'Jumlah Perkara yang Ditolak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_program' => '3',
                'nama_indikator' => 'Jumlah Perkara yang Dihapus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_program' => '3',
                'nama_indikator' => 'Jumlah Perkara yang Dibatalkan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_program' => '4',
                'nama_indikator' => 'Jumlah Perkara yang Diamputasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'id_program' => '4',
                'nama_indikator' => 'Jumlah Perkara yang Dikembalikan ke Pengadilan Negeri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($indikatorData as $indikator) {
            Indikator::create($indikator);
        }
    }
}

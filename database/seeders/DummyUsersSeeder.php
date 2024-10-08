<?php

namespace Database\Seeders;

use App\Models\NewUser;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'nama' => 'Admin',
                'id_jabatan' => '1',
                'kepegawaian' => 'pns',
                'level' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('admin'),
            ],
            [
                'nama' => 'Onny Ardianto S.Sos., M.M.',
                'id_jabatan' => '1',
                'kepegawaian' => 'pns',
                'level' => 'pejabat',
                'username' => '197708252005011012',
                'email' => 'kadis@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('kadis'),
            ],
            [
                'nama' => 'Muhammad Dwiyanto',
                'id_jabatan' => '2',
                'kepegawaian' => 'pns',
                'level' => 'pejabat',
                'username' => '197708252005011013',
                'email' => 'sekre@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('sekre'),
            ],
            [
                'nama' => 'Yulianti Novida',
                'id_jabatan' => '3',
                'kepegawaian' => 'pns',
                'level' => 'pejabat',
                'username' => '197708252005011014',
                'email' => 'subagumum@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('tanti'),
            ],
            [
                'nama' => 'Ferly Syahrudin',
                'id_jabatan' => '4',
                'kepegawaian' => 'pns',
                'level' => 'pejabat',
                'username' => '197708252005011015',
                'email' => 'ferly@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('ferly'),
            ],
            [
                'nama' => 'Dedie Sugeng Budirino',
                'id_jabatan' => '5',
                'kepegawaian' => 'pns',
                'level' => 'pejabat',
                'username' => '197708252005011016',
                'email' => 'dedie@gmial.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('dedie'),
            ],
            [
                'nama' => 'Tutri Laksono Adi',
                'id_jabatan' => '6',
                'kepegawaian' => 'pns',
                'level' => 'pejabat',
                'username' => '197708252005011017',
                'email' => 'tutri@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('tutri'),
            ],
            [
                'nama' => 'Eva Yustina',
                'id_jabatan' => '7',
                'kepegawaian' => 'pns',
                'level' => 'pejabat',
                'username' => '197708252005011018',
                'email' => 'eva@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('eva123'),
            ],
            [
                'nama' => 'Dra.Ririn Setyaningsih',
                'id_jabatan' => '8',
                'kepegawaian' => 'pns',
                'level' => 'user',
                'username' => '197708252005011019',
                'email' => 'ririn@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('ririn'),
            ],
            [
                'nama' => 'Santi Yusinta',
                'id_jabatan' => '9',
                'kepegawaian' => 'pns',
                'level' => 'user',
                'username' => '197708252005011020',
                'email' => 'santi@gmail.com',
                'no_hp' => '081234567890',
                'password' => bcrypt('santi'),
            ],


        ];

        foreach ($userData as $key => $val) {
            NewUser::create($val);
        }
    }
}

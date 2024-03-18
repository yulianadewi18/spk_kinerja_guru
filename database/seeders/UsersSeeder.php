<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Yuliana Dewi',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'roles' => 'admin',
            ],
            [
                'name' => 'penilai 1',
                'username' => 'penilai1',
                'password' => bcrypt('penilai01'),
                'roles' => 'penilai',
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}

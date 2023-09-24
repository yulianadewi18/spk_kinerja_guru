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
                'name' => 'Penguji 1',
                'username' => 'penguji1',
                'password' => bcrypt('penguji01'),
                'roles' => 'penguji',
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubKriteria;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub = [
            [
                'sub_kriteria' => 'Sangat terpenuhi',
                'bobot' => '4',
            ],[
                'sub_kriteria' => 'Terpenuhi',
                'bobot' => '3',
            ],[
                'sub_kriteria' => 'Cukup',
                'bobot' => '2',
            ],[
                'sub_kriteria' => 'Tidak Terpenuhi',
                'bobot' => '1',
            ],
        ];

        foreach ($sub as $key => $value) {
            SubKriteria::create($value);
        }
    }
}

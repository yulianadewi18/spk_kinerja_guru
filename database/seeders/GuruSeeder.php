<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate dummy data for mst_guru table
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'nama_guru' => 'Guru ' . ($i + 1),
                'gender' => $i % 2 == 0 ? 'Laki-laki' : 'Perempuan',
                'nipa' => Str::random(10),
                'tempat_lahir' => 'Tempat Lahir ' . ($i + 1),
                'tanggal_lahir' => now()->subYears(rand(20, 50)),
                'nuptk' => Str::random(16),
                'nrg' => Str::random(16),
                'jns_guru' => 'Jenis Guru ' . ($i + 1),
                'tugas' => 'Tugas Guru ' . ($i + 1),
                'tambahan' => 'Tambahan Guru ' . ($i + 1),
                'ijazah' => 'IJAZAH ' . ($i + 1),
                'tahun_lulus' => rand(1990, 2020),
                'pt' => 'PT ' . ($i + 1),
                'fakultas' => 'Fakultas ' . ($i + 1),
                'jurusan' => 'Jurusan ' . ($i + 1),
                'prodi' => 'Prodi ' . ($i + 1),
                'akta_mengajar' => 'Akta Mengajar ' . ($i + 1),
                'jalan' => 'Jalan ' . ($i + 1),
                'rt' => rand(1, 10),
                'rw' => rand(1, 10),
                'dusun' => 'Dusun ' . ($i + 1),
                'kelurahan' => 'Kelurahan ' . ($i + 1),
                'kecamatan' => 'Kecamatan ' . ($i + 1),
                'kabupaten' => 'Kabupaten ' . ($i + 1),
                'kodepos' => 'Kodepos ' . ($i + 1),
                'nohp' => '08123456789',
                'nohp2' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert dummy data into mst_guru table
        DB::table('mst_guru')->insert($data);
    }
}

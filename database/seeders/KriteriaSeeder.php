<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            [
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Menguasai Karakteristik Peserta Didik',
                'sifat' => 'benefit',
                'bobot_kriteria' => '10',
            ],[
                'kode_kriteria' => 'C2',
                'nama_kriteria' => 'Mengusai Teori Belajar dan Prinsip-Prinsip Pembelajaran Yang Mendidik',
                'sifat' => 'benefit',
                'bobot_kriteria' => '10',
            ],[
                'kode_kriteria' => 'C3',
                'nama_kriteria' => 'Pengembangan Kurikulum',
                'sifat' => 'benefit',
                'bobot_kriteria' => '9',
            ],[
                'kode_kriteria' => 'C4',
                'nama_kriteria' => 'Kegiatan Pembelajaran Yang Mendidik',
                'sifat' => 'benefit',
                'bobot_kriteria' => '9',
            ],[
                'kode_kriteria' => 'C5',
                'nama_kriteria' => 'Pengembangan Potensi Peserta Didik berakhlak mulia',
                'sifat' => 'benefit',
                'bobot_kriteria' => '8',
            ],[
                'kode_kriteria' => 'C6',
                'nama_kriteria' => 'Komunikasi Dengan Peserta Didik',
                'sifat' => 'benefit',
                'bobot_kriteria' => '8',
            ],[
                'kode_kriteria' => 'C7',
                'nama_kriteria' => 'Penilaian Dan Evaluasi',
                'sifat' => 'benefit',
                'bobot_kriteria' => '7',
            ],[
                'kode_kriteria' => 'C8',
                'nama_kriteria' => 'Bertindak Sesuai Dengan Norma Agama, Hukum, Sosial Dan Sosial Budaya',
                'sifat' => 'benefit',
                'bobot_kriteria' => '7',
            ],[
                'kode_kriteria' => 'C9',
                'nama_kriteria' => 'Menunjukan Pribadi Yang Dewasa Dan Teladan',
                'sifat' => 'benefit',
                'bobot_kriteria' => '6',
            ],[
                'kode_kriteria' => 'C10',
                'nama_kriteria' => 'Etos Kerja, Tanggung Jawab Yang Tinggi dan Rasa Bangga Menjadi Guru',
                'sifat' => 'benefit',
                'bobot_kriteria' => '6',
            ],[
                'kode_kriteria' => 'C11',
                'nama_kriteria' => 'Bersikap Inklusif, Bertindak Obyektif, Serta Tidak Diskriminatif',
                'sifat' => 'benefit',
                'bobot_kriteria' => '5',
            ],[
                'kode_kriteria' => 'C12',
                'nama_kriteria' => 'Komunikasi Dengan Sesama Guru, Tenaga Kependidikan, Orang Tua, Peserta Didik Dan Masyarakat',
                'sifat' => 'benefit',
                'bobot_kriteria' => '5',
            ],[
                'kode_kriteria' => 'C13',
                'nama_kriteria' => 'Penguasaan Materi, Struktur, Konsep Dan Pola Pikir Keilmuan Yang Mendukung Mata pelajaran Yang Diampu',
                'sifat' => 'benefit',
                'bobot_kriteria' => '5',
            ],[
                'kode_kriteria' => 'C14',
                'nama_kriteria' => 'Mengembangkan Keprofesionalan Melalui Tindakan Yang Reflektif',
                'sifat' => 'benefit',
                'bobot_kriteria' => '5',
            ],
        ];

        foreach ($kriteria as $key => $value) {
            Kriteria::create($value);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;

class HasilPerhitunganController extends Controller
{
    public function index()
    {
        $user_id = Auth::id(); // Get the current user's ID

        $periode = request()->input('periode');
        $penguji = request()->input('penguji');
        // Retrieve data from the database
        $alternatif = Alternatif::with('penilaian.kriteria')->orderBy('kode_alternatif', 'ASC')->get();
        $kriteria = Kriteria::get();
        if ($penguji == null) {
            $penilaian = Penilaian::with('subKriteria')
                ->when(Auth::user()->roles != "admin", function ($query) use ($user_id) {
                    return $query->where('id_admin', $user_id);
                })
                ->where('periode', $periode) // Tambahkan kondisi where untuk periode
                ->get();
        } else {
            $penilaian = Penilaian::with('subKriteria')
                ->where('id_admin', $penguji)
                ->where('periode', $periode) // Tambahkan kondisi where untuk periode
                ->get();
        }

        // Calculate min and max values for each criteria
        $minMax = [];
        foreach ($kriteria as $vkriteria) {
            foreach ($penilaian as $vpenilaian) {
                if ($vkriteria->id == $vpenilaian->id_kriteria) {
                    if ($vkriteria->sifat == "benefit") {
                        $minMax[$vkriteria->id][] = $vpenilaian->subKriteria['bobot'];
                    } elseif ($vkriteria->sifat == "cost") {
                        $minMax[$vkriteria->id][] = $vpenilaian->subKriteria['bobot'];
                    }
                }
            }
        }

        // Perform normalization
        $normalisasi = [];
        foreach ($penilaian as $vpenilaian) {
            foreach ($kriteria as $vkriteria) {
                if ($vkriteria->id == $vpenilaian->id_kriteria) {
                    if ($vkriteria->sifat == "benefit") {
                        $normalisasi[$vpenilaian->alternatif->guru['id']][$vkriteria->id] = $vpenilaian->subKriteria['bobot'] / max($minMax[$vkriteria->id]);
                    } elseif ($vkriteria->sifat == "cost") {
                        $normalisasi[$vpenilaian->alternatif->guru['id']][$vkriteria->id] = min($minMax[$vkriteria->id]) / $vpenilaian->subKriteria['bobot'];
                    }
                }
            }
        }

        // Perform ranking
        $rank = [];
        foreach ($normalisasi as $key => $vnormalisasi) {
            foreach ($kriteria as $vkriteria) {
                if (isset($vnormalisasi[$vkriteria->id])) {
                    $rank[$key][] = $vnormalisasi[$vkriteria->id] * $vkriteria->bobot_kriteria;
                } else {
                    $rank[$key][] = 0; // Assign a default value
                }
            }
        }

        // Sum up the ranks and determine the status keterangan
        $statusKeterangan = [];
        foreach ($normalisasi as $key => $value) {
            $rank[$key][] = array_sum($rank[$key]);
            if ($rank[$key] >= 100) {
                $statusKeterangan[$key] = 'Sangat Baik';
            } elseif ($rank[$key] >= 70 && $rank[$key] < 100) {
                $statusKeterangan[$key] = 'Baik';
            } elseif ($rank[$key] >= 20 && $rank[$key] < 70) {
                $statusKeterangan[$key] = 'Cukup';
            } else {
                $statusKeterangan[$key] = 'Kurang';
            }
        }
        // Membuat koleksi Laravel dari array
        $collection = collect($rank);

        // Mengurutkan koleksi berdasarkan nilai di dalam array ke-14 (descending)
        $sortedDescending = $collection->sortByDesc(function ($item) {
            return $item[14];
        });

        // Mengubah kembali ke bentuk array
        $rank = $sortedDescending->toArray();
        // dd($sortedArray);
        return view('pages.hasil_perhitungan.index', compact('kriteria', 'alternatif', 'penilaian', 'minMax', 'normalisasi', 'rank'));
    }
}

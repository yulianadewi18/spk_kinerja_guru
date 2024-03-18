<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class HasilPerhitunganController extends Controller
{
    function index()
    {
        $alternatif = Alternatif::with('penilaian.kriteria')->orderBy('kode_alternatif', 'ASC')->get();
        $kriteria = Kriteria::get();
        $penilaian = Penilaian::with('subKriteria')->get();
        // return response()->json($alternatif);

        // mencari min max
        foreach ($kriteria as $key => $vkriteria) {
            foreach ($penilaian as $key_1 => $vpenilaian) {
                if ($vkriteria->id == $vpenilaian->id_kriteria) {
                    if ($vkriteria->sifat == "benefit") {
                        $minMax[$vkriteria->id][] = $vpenilaian->subKriteria['bobot'];
                    } elseif ($vkriteria->sifat == "cost") {
                        $minMax[$vkriteria->id][] = $vpenilaian->subKriteria['bobot'];
                    }
                }
            }
        }

        // normalisasi
        foreach ($penilaian as $key_1 => $vpenilaian) {
            foreach ($kriteria as $key => $vkriteria) {
                if ($vkriteria->id == $vpenilaian->id_kriteria) {
                    if ($vkriteria->sifat == "benefit") { //nilai sub_kriteria : nilai maksimal
                        $normalisasi[$vpenilaian->alternatif->guru['id']][$vkriteria->id] = $vpenilaian->subKriteria['bobot'] / max($minMax[$vkriteria->id]);
                    } elseif ($vkriteria->sifat == "cost") { //nilai minimal : nilai sub_kriteria
                        $normalisasi[$vpenilaian->alternatif->guru['id']][$vkriteria->id] = min($minMax[$vkriteria->id]) / $vpenilaian->subKriteria['bobot'];
                    }
                }
            }
        }

        // perangkingan
        foreach ($normalisasi as $key => $vnormalisasi) {
            foreach ($kriteria as $key_1 => $vkriteria) { // hasil normalisasi x bobot_kriteria
                // Check if the key exists in the $vnormalisasi array
                if (isset($vnormalisasi[$vkriteria->id])) {
                    $rank[$key][] = $vnormalisasi[$vkriteria->id] * $vkriteria->bobot_kriteria;
                } else {
                    // Handle the case when the key is not found (you can skip it or handle it accordingly)
                    // For example, you might want to assign a default value or log a message.
                    $rank[$key][] = 0; // Assign a default value
                    // or
                    // log_message('error', 'Key not found: ' . $vkriteria->id);
                }
            }
        }

        foreach ($normalisasi as $key => $value) { //total hasil perangkingan
            $rank[$key][] = array_sum($rank[$key]);
            // Tambahkan logika untuk menentukan status keterangan
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

        arsort($rank); //sortir $rank

        // dd($rank);
        return view('pages.hasil_perhitungan.index', compact(['kriteria', 'alternatif', 'penilaian', 'minMax', 'normalisasi', 'rank']));
    }
}

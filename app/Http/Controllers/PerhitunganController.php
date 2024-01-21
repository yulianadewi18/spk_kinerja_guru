<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;

class PerhitunganController extends Controller
{
    function index() {
        $alternatif = Alternatif::with('penilaian.kriteria')->orderBy('kode_alternatif','ASC')->get();
        $kriteria = Kriteria::get();
        $penilaian = Penilaian::with('subKriteria')->get();
        // return response()->json($alternatif);

        // mencari min max
        foreach ($kriteria as $key => $vkriteria) {
            foreach ($penilaian as $key_1 => $vpenilaian) {
                if ($vkriteria->id == $vpenilaian->id_kriteria) {
                    if ($vkriteria->sifat == "benefit") {
                        $minMax[$vkriteria->id][] = $vpenilaian->subKriteria['bobot'];
                    }elseif ($vkriteria->sifat == "cost") {
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
                        $normalisasi[$vpenilaian->alternatif->guru['nama_guru']][$vkriteria->id] = $vpenilaian->subKriteria['bobot'] / max($minMax[$vkriteria->id]);
                    }elseif ($vkriteria->sifat == "cost") { //nilai minimal : nilai sub_kriteria
                        $normalisasi[$vpenilaian->alternatif->guru['nama_guru']][$vkriteria->id] = min($minMax[$vkriteria->id]) / $vpenilaian->subKriteria['bobot'];
                    }
                }
            }
        }

        // perangkingan
        foreach ($normalisasi as $key => $vnormalisasi) {
            foreach ($kriteria as $key_1 => $vkriteria) { //hasil normalisasi x bobot_kriteria
                $rank[$key][] = $vnormalisasi[$vkriteria->id] * $vkriteria->bobot_kriteria;
            }
        }
        foreach ($normalisasi as $key => $value){ //total hasil perangkingan
            $rank[$key][] = array_sum($rank[$key]);
        }
        asort($rank); //sortir $rank

        // dd($minMax);
        return view('pages.proses_penilaian.index', compact(['kriteria','alternatif','penilaian','minMax','normalisasi','rank']));
    }
}

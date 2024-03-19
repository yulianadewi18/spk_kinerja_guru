<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;

class PerhitunganController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $periode = request()->input('periode');
        $penguji = request()->input('penguji');
        if ($penguji == null) {
            $alternatif = Alternatif::with(['penilaian' => function ($query) use ($user_id, $periode) {
                $query->when(Auth::user()->roles != "admin", function ($query) use ($user_id) {
                    $query->where('id_admin', $user_id);
                });
                $query->where('periode', $periode); // Kondisi where untuk periode
            }])->orderBy('kode_alternatif', 'ASC')->get();
        } else {
            $alternatif = Alternatif::with(['penilaian' => function ($query) use ($penguji, $periode) {
                $query->where('id_admin', $penguji);
                $query->where('periode', $periode); // Kondisi where untuk periode
            }])->orderBy('kode_alternatif', 'ASC')->get();
        }
        // dd($alternatif);
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
                ->where('periode', $periode)
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
                        $normalisasi[$vpenilaian->alternatif->guru['nama_guru']][$vkriteria->id] = $vpenilaian->subKriteria['bobot'] / max($minMax[$vkriteria->id]);
                    } elseif ($vkriteria->sifat == "cost") {
                        $normalisasi[$vpenilaian->alternatif->guru['nama_guru']][$vkriteria->id] = min($minMax[$vkriteria->id]) / $vpenilaian->subKriteria['bobot'];
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

        // Calculate total ranking for each alternative
        foreach ($normalisasi as $key => $value) {
            $rank[$key][] = array_sum($rank[$key]);
        }
        // dd($kriteria);
        // Sort the ranking
        // arsort($rank);

        // Pass data to the view
        return view('pages.proses_penilaian.index', compact('kriteria', 'alternatif', 'penilaian', 'minMax', 'normalisasi', 'rank'));
    }
}

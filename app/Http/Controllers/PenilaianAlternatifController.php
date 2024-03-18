<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\Auth;

class PenilaianAlternatifController extends Controller
{
    function index(Request $request)
    {
        $selectedPeriode = $request->periode;
        $user_id = Auth::id(); // Get the current user's ID
        $penguji = request()->input('penguji');
        if ($penguji == null) {
            $query = Penilaian::with(['alternatif', 'kriteria', 'subKriteria'])
                ->when(Auth::user()->roles != "admin", function ($query) use ($user_id) {
                    return $query->where('id_admin', $user_id);
                })
                ->groupBy('periode', 'id_alternatif')
                ->selectRaw('MAX(id) as id, periode, id_alternatif');
        } else {
            $query = Penilaian::with(['alternatif', 'kriteria', 'subKriteria'])
                ->where('id_admin', $penguji)
                ->groupBy('periode', 'id_alternatif')
                ->selectRaw('MAX(id) as id, periode, id_alternatif');
        }
        if ($selectedPeriode) {
            $query->where('periode', $selectedPeriode);
        }

        $penilaian = $query->orderBy('periode', 'asc') // Mengurutkan berdasarkan periode secara ascending
            ->get();

        $periode = Penilaian::distinct()->pluck('periode');

        return view('pages.penilaian.index', compact('penilaian', 'periode', 'selectedPeriode'));
    }


    function create()
    {
        $alternatif     = Alternatif::with('guru')->get();
        $kriteria       = Kriteria::get();
        $subKriteria    = SubKriteria::get();
        // dd($alternatif);
        return view('pages.penilaian.form', compact(['alternatif', 'kriteria', 'subKriteria']));
    }

    public function store(Request $request)
    {

        if (!$request->filled(['periode', 'id_alternatif', 'id_kriteria', 'id_sub'])) {
            if (session()->get('user_id') == 1) {
                return redirect()->route('penilaian_alternatif', ['penguji' => 1])->with('error', 'Ada data yang masih kosong!');
            } else {
                return redirect()->route('penilaian_alternatif')->with('error', 'Ada data yang masih kosong!');
            }
        }
        // Menguji apakah ada penilaian yang sudah ada untuk id_alternatif dan periode yang sama
        $existingPenilaian = Penilaian::where('id_alternatif', $request->id_alternatif)
            ->where('periode', $request->periode)
            ->where('id_admin', session()->get('user_id'))
            ->exists();

        // Jika penilaian sudah ada untuk id_alternatif dan periode yang sama, berikan pesan kesalahan
        if ($existingPenilaian) {
            return redirect()->route('penilaian_alternatif')->with('error', 'Penilaian untuk id_alternatif dan periode yang sama sudah ada.');
        }

        $kriteria = $request->id_kriteria;
        $subKriteria = $request->id_sub;

        for ($i = 0; $i < count($kriteria); $i++) {
            // Memeriksa apakah ada data yang kosong di dalam array kriteria dan subkriteria
            if (empty($kriteria[$i]) || empty($subKriteria[$i])) {
                return redirect()->route('penilaian_alternatif')->with('error', 'Ada data kriteria atau subkriteria yang masih kosong!');
            }

            $penilaian = new Penilaian;
            $penilaian->periode = $request->periode;
            $penilaian->id_alternatif = $request->id_alternatif;
            $penilaian->id_kriteria = $kriteria[$i];
            $penilaian->id_sub = $subKriteria[$i];
            $penilaian->id_admin = session()->get('user_id');
            $penilaian->save();
        }

        // Redirect to a view or route after saving the data
        if (session()->get('user_id') == 1) {
            return redirect()->route('penilaian_alternatif', ['penguji' => 1])->with('success', 'Penilaian updated successfully');
        } else {
            return redirect()->route('penilaian_alternatif')->with('success', 'Penilaian updated successfully');
        }
    }


    public function edit($kode_alternatif, $periode)
    {
        // Find the Penilaian record based on the kode_alternatif and periode
        $penilaian = Penilaian::whereHas('alternatif', function ($query) use ($kode_alternatif) {
            $query->where('kode_alternatif', $kode_alternatif);
        })
            ->where('periode', $periode)
            ->get();

        // Retrieve all alternatif, kriteria, and subkriteria
        $alternatif = Alternatif::with('guru')->get();
        $kriteria = Kriteria::get();
        $subKriteria = SubKriteria::get();
        // dd($penilaian);
        return view('pages.penilaian.edit', compact('penilaian', 'alternatif', 'kriteria', 'subKriteria'));
    }

    public function delete($kode_alternatif, $periode)
    {
        try {
            // Find all Penilaian records based on kode_alternatif and periode
            $penilaians = Penilaian::whereHas('alternatif', function ($query) use ($kode_alternatif) {
                $query->where('kode_alternatif', $kode_alternatif);
            })
                ->where('periode', $periode)
                ->get();

            if ($penilaians->isEmpty()) {
                return response()->json(['message' => 'No Penilaian found for the provided kode_alternatif and periode'], 404);
            }

            // Delete all found records
            foreach ($penilaians as $penilaian) {
                $penilaian->delete();
            }

            return response()->json(['message' => 'Penilaian deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting penilaian', 'error' => $e->getMessage()], 500);
        }
    }


    public function update(Request $request, $kode_alternatif, $periode)
    {
        $kriteria = $request->id_kriteria;
        $subKriteria = $request->id_sub;

        // Pastikan untuk menambahkan klausa where pada metode where di bawah ini
        Penilaian::where('id_alternatif', $kode_alternatif)
            ->where('periode', $periode)
            ->delete(); // Hapus penilaian sebelumnya

        for ($i = 0; $i < count($kriteria); $i++) {
            $penilaian = new Penilaian;
            $penilaian->periode = $request->periode;
            $penilaian->id_alternatif = $request->id_alternatif;
            $penilaian->id_kriteria = $kriteria[$i];
            $penilaian->id_sub = $subKriteria[$i];
            $penilaian->id_admin = session()->get('user_id');
            $penilaian->save();
        }

        // Redirect to a view or route after saving the data
        return redirect()->route('penilaian_alternatif')->with('success', 'Penilaian updated successfully');
    }
}

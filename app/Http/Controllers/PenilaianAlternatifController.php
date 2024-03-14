<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;

class PenilaianAlternatifController extends Controller
{
    function index()
    {
        $penilaian = Penilaian::with(['alternatif', 'kriteria', 'subKriteria'])->get();
        // dd($penilaian);
        return view('pages.penilaian.index', compact('penilaian'));
    }

    function create()
    {
        $alternatif     = Alternatif::with('guru')->get();
        $kriteria       = Kriteria::get();
        $subKriteria    = SubKriteria::get();
        return view('pages.penilaian.form', compact(['alternatif', 'kriteria', 'subKriteria']));
    }

    public function store(Request $request)
    {
        $kriteria = $request->id_kriteria;
        $subKriteria = $request->id_sub;

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

    public function edit($id)
    {
        $penilaian = Penilaian::findOrFail($id);

        // Retrieve all alternatif, kriteria, and subkriteria
        $alternatif = Alternatif::with('guru')->get();
        $kriteria = Kriteria::get();
        $subKriteria = SubKriteria::get();

        // Get the selected kriteria's id from the penilaian
        $selectedKriteriaId = $penilaian->id_kriteria;

        // If a specific kriteria is selected, filter the kriteria and subkriteria
        if ($selectedKriteriaId) {
            $kriteria = Kriteria::where('id', $selectedKriteriaId)->get();
        }
        // dd($penilaian);
        return view('pages.penilaian.edit', compact('penilaian', 'alternatif', 'kriteria', 'subKriteria'));
    }

    public function delete($id)
    {
        try {
            $penilaian = Penilaian::find($id);

            if (!$penilaian) {
                return response()->json(['message' => 'Penilaian not found'], 404);
            }

            $penilaian->delete();

            return response()->json(['message' => 'Penilaian deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting penilaian', 'error' => $e->getMessage()], 500);
        }
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'id_sub' => 'required',
        ]);

        // Mendapatkan nilai id_sub dari array pertama
        $idSub = $request->input('id_sub.0');

        // Update the PenilaianKriteria record
        Penilaian::where('id', $id)
            ->update(['id_sub' => $idSub]);

        // Redirect or respond accordingly
        return redirect()->route('penilaian_alternatif')->with('success', 'Penilaian updated successfully');
    }
}

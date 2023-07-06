<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class DataKriteriaController extends Controller
{
    function index() {
        return view('pages.data_kriteria.index');
    }

    function create() {
        return view('pages.data_kriteria.form');
    }
    
    function store(Request $request) {
        $validated = $request->validate([
            'kode_kriteria'  => 'required|unique:mst_kriteria',
            'nama_kriteria'  => 'required',
            'bobot_kriteria'  => 'required',
        ]);

        Kriteria::create($validated);
        return redirect('/data-kriteria')->with('success', 'Berhasil tambah pengguna baru.');
    }
    
    function destroy($id) {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        return response('Data berhasil dihapus.', 200);
    }
}


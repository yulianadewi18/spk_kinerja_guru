<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class DataKriteriaController extends Controller
{
    function index(Request $request) {
        $data_kriteria = Kriteria::get();
        if ($request->ajax()) {
            $fetchAll = DataTables::of($data_kriteria)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return'
                    <a href="'. route('edit_kriteria',$data->id) .'" class="btn btn-warning btn-sm" >Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('destroy_kriteria', $data->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $fetchAll;
        }
        return view('pages.data_kriteria.index', compact('data_kriteria'));
    }

    function create() {
        return view('pages.data_kriteria.form');
    }
    
    function store(Request $request) {
        $request->session()->flash('kode_kriteria', $request->kode_kriteria);
        $request->session()->flash('nama_kriteria', $request->nama_kriteria);
        $request->session()->flash('bobot_kriteria', $request->bobot_kriteria);

        $data = $request->validate([
            'kode_kriteria'  => 'required|unique:mst_kriteria',
            'nama_kriteria'  => 'required',
            'bobot_kriteria'  => 'required',
        ],[
            'kode_kriteria.required'  => 'Kode Kriteria wajib diisi',
            'kode_kriteria.unique'  => 'Kode Kriteria sudah terpakai',
            'nama_kriteria.required'  => 'Nama Kriteria wajib diisi',
            'bobot_kriteria.required'  => 'Bobot Kriteria wajib diisi',
        ]);

        Kriteria::create($data);
        return redirect('/data-kriteria')->with('success', 'Berhasil tambah kriteria baru.');
    }

    function edit($id) {
        $kriteria = Kriteria::find($id);
        return view('pages.data_kriteria.form',compact('kriteria'));
    }

    function update(Request $request, $id) {
        $data = $request->validate([
            'nama_kriteria'  => 'required',
            'bobot_kriteria'  => 'required',
        ],[
            'nama_kriteria.required'  => 'Nama Kriteria wajib diisi',
            'bobot_kriteria.required'  => 'Bobot Kriteria wajib diisi',
        ]);

        Kriteria::find($id)->update($data);
        return redirect('/data-kriteria')->with('success', 'Data berhasil Update.');
    }
    
    function destroy($id) {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        return response('Data berhasil dihapus.', 200);
    }
}


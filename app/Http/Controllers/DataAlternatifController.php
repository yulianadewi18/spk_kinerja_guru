<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use DataTables;

class DataAlternatifController extends Controller
{
    function index(Request $request) {
        $data_alternatif = Alternatif::get();
        if ($request->ajax()) {
            $fetchAll = DataTables::of($data_alternatif)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return'
                    <a href="'. route('edit_alternatif',$data->id) .'" class="btn btn-warning btn-sm" >Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('destroy_alternatif', $data->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $fetchAll;
        }
        return view('pages.data_alternatif.index', compact('data_alternatif'));
    }

    function create() {
        return view('pages.data_alternatif.form');
    }
    
    function store(Request $request) {
        $request->session()->flash('kode_alternatif', $request->kode_alternatif);
        $request->session()->flash('nama_alternatif', $request->nama_alternatif);

        $data = $request->validate([
            'kode_alternatif'  => 'required|unique:mst_kriteria',
            'nama_alternatif'  => 'required',
        
        ],[
            'kode_alternatif.required'  => 'Kode alternatif wajib diisi',
            'kode_alternatif.unique'  => 'Kode Alternatif sudah terpakai',
            'nama_alternatif.required'  => 'Nama alternatif wajib diisi',
        ]);

        Alternatif::create($data);
        return redirect('/data-alternatif')->with('success', 'Berhasil tambah alternatif baru.');
    }

    function edit($id) {
        $alternatif = Alternatif::find($id);
        return view('pages.data_alternatif.form',compact('alternatif'));
    }

    function update(Request $request, $id) {
        $data = $request->validate([
            'kode_alternatif'  => 'required|unique:mst_kriteria',
            'nama_alternatif'  => 'required',
        
        ],[
            'kode_alternatif.required'  => 'Kode alternatif wajib diisi',
            'kode_alternatif.unique'  => 'Kode alternatif sudah terpakai',
            'nama_alternatif.required'  => 'Nama alternatif wajib diisi',
        ]);

        Alternatif::find($id)->update($data);
        return redirect('/data-alternatif')->with('success', 'Data berhasil Update.');
    }
    
    function destroy($id) {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();

        return response('Data berhasil dihapus.', 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Guru;
use Illuminate\Http\Request;
use DataTables;

class DataAlternatifController extends Controller
{
    function index(Request $request) {
        $data_alternatif = Alternatif::get();
        if ($request->ajax()) {
            $fetchAll = DataTables::of($data_alternatif)
            ->addIndexColumn()
            ->addColumn('nama_alternatif', function ($data) {
                return $data->guru['nama_guru'];
            })
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
        $guru = Guru::get();
        return view('pages.data_alternatif.form',compact('guru'));
    }
    
    function store(Request $request) {
        $request->session()->flash('kode_alternatif', $request->kode_alternatif);
        $request->session()->flash('id_guru', $request->nama_alternatif);

        $data = $request->validate([
            'kode_alternatif'  => 'required|unique:mst_alternatif',
            'id_guru'  => 'required|unique:mst_alternatif',
        
        ],[
            'kode_alternatif.required'  => 'Kode Alternatif wajib diisi',
            'kode_alternatif.unique'  => 'Kode Alternatif sudah terpakai',
            'id_guru.required'  => 'Pilih Alternatif',
            'id_guru.unique'  => 'Nama Alternatif sudah ada',
        ]);

        Alternatif::create($data);
        return redirect('/data-alternatif')->with('success', 'Berhasil tambah alternatif baru.');
    }

    function edit($id) {
        $alternatif = Alternatif::find($id);
        $guru = Guru::get();
        return view('pages.data_alternatif.form',compact(['alternatif','guru']));
    }

    function update(Request $request, $id) {
        $data = $request->validate([
            'kode_alternatif'   => 'required|unique:mst_alternatif,kode_alternatif,'.$id,
            'id_guru'           => 'required|unique:mst_alternatif,id_guru,'.$id,
        
        ],[
            'kode_alternatif.required'  => 'Kode Alternatif wajib diisi',
            'kode_alternatif.unique'  => 'Kode Alternatif sudah terpakai',
            'id_guru.required'  => 'Pilih Alternatif',
            'id_guru.unique'  => 'Nama Alternatif sudah ada',
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

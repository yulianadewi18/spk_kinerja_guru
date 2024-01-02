<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class DataSubKriteriaController extends Controller
{
    function index(Request $request)
    {
        $data_sub_kriteria = SubKriteria::get();
        if ($request->ajax()) {
            $fetchAll = DataTables::of($data_sub_kriteria)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '
                    <a href="' . route('edit_sub_kriteria', $data->id) . '" class="btn btn-warning btn-sm" >Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`' . route('destroy_sub_kriteria', $data->id) . '`)">Hapus </button>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
            return $fetchAll;
        }
        return view('pages.data_sub_kriteria.index', compact('data_sub_kriteria'));
    }

    function create()
    {
        return view('pages.data_sub_kriteria.form');
    }

    function store(Request $request)
    {
        $request->session()->flash('sub_kriteria', $request->sub_kriteria);
        $request->session()->flash('bobot', $request->bobot);
      

        $data = $request->validate([
            'sub_kriteria'  => 'required|unique:mst_sub_kriteria',
            'bobot'  => 'required',
        ], [
            'sub_kriteria.required'  => 'Sub Kriteria wajib diisi',
            'sub_kriteria.unique'  => 'Sub Kriteria sudah ada',
            'bobot.required'  => 'Bobot Sub Kriteria wajib diisi',
        ]);

        SubKriteria::create($data);
        return redirect('/data-sub-kriteria')->with('success', 'Berhasil tambah sub kriteria baru.');
    }

    function edit($id)
    {
        $subkriteria = SubKriteria::find($id);
        return view('pages.data_sub_kriteria.form', compact('subkriteria'));
    }

    function update(Request $request, $id)
    {
        $data = $request->validate([
            'sub_kriteria'  => 'required|unique:mst_sub_kriteria,sub_kriteria,'.$id,
            'bobot'  => 'required',
        ], [
            'sub_kriteria.required'  => 'Kode Sub Kriteria wajib diisi',
            'sub_kriteria.unique'  => 'Kode Sub Kriteria sudah terpakai',
            'bobot.required'  => 'Bobot Sub Kriteria wajib diisi',
        ]);

        SubKriteria::find($id)->update($data);
        return redirect('/data-sub-kriteria')->with('success', 'Data berhasil Update.');
    }

    function destroy($id)
    {
        $subkriteria = SubKriteria::find($id);
        $subkriteria->delete();

        return response('Data berhasil dihapus.', 200);
    }
}

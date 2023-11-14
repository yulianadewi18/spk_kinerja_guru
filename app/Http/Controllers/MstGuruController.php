<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gurumodel;
use DataTables;


class MstGuruController extends Controller
{
    public function index() {
        $alamien = gurumodel::all();
        return view('pages.mst_guru.index', compact('alamien'));
       

    function create() {
        return view('pages.mst_guru.form');
    }
}

public function delete($id)
    {
        Data::where('nama', $id)->delete();
        Guru::find($id)->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}

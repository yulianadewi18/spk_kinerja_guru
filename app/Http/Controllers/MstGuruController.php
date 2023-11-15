<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gurumodel;
use App\Models\Guru;
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

public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $nilai = gurumodel::where('nama', $id)->get();
        $dataView = $this->getDataInsert();
        // dd($nilai);
        return view('pages.mst_guru.edit', compact('guru', 'dataView', 'nilai'));
    }
    

    public function delete($id)
    {
        $guru = Guru::find($id);
    
        if ($guru) {
            $guru->delete();
            // Lanjutkan dengan penghapusan lain atau tindakan yang sesuai
            return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
        } else {
            // Handle kasus di mana data tidak ditemukan
            return redirect()->route('guru.index')->with('error', 'Data guru tidak ditemukan.');
        }
    }
    
}
 
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
}

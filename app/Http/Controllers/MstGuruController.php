<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MstGuruController extends Controller
{
    function index() {
        return view('pages.mst_guru.index');
    }

    function create() {
        return view('pages.mst_guru.form');
    }
}

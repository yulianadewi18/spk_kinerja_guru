<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianAlternatifController extends Controller
{
    function index() {
        return view('pages.penilaian.index');
    }

    function create() {
        return view('pages.penilaian.form');
    }
}

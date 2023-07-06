<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    function index() {
        return view('pages.proses_penilaian.index');
    }
}

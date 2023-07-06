<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAlternatifController extends Controller
{
    function index() {
        return view('pages.data_alternatif.index');
    }

    function create() {
        return view('pages.data_alternatif.form');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Guru;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countdataguru = Guru::count();
        $countdatapenilaian = Penilaian::count();
        $countdataalternative = Alternatif::count();
        return view('pages.dashboard', compact('countdataguru', 'countdatapenilaian','countdataalternative'));
    }
}

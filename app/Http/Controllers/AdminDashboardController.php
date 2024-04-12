<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tahun;
use App\Models\Alumnus;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $adminCount = Admin::count();
        $alumniCount = Alumnus::count();
        $tahunCount = Tahun::count();
        $lanjutSekolahCount = Alumnus::whereNotNull('lnjt_sklh')->count();

        return view('admin.dashboard', compact('adminCount', 'alumniCount', 'tahunCount', 'lanjutSekolahCount'));
    }
}

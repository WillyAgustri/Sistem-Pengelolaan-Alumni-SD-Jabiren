<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tahun;
use App\Models\Alumnus;
use App\Models\Aktivasi;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $adminCount = Admin::count();
        $alumniCount = Alumnus::count();
        $tahunCount = Tahun::count();
        $aktivasiCount = Aktivasi::count();
        $getTahun = Tahun::all();
        $alumniPerTahun = [];
        foreach ($getTahun as $tahun) {
            $alumniPerTahun[$tahun->tahun] = Alumnus::where('id_tahun', $tahun->tahun)->count() ?: 0;
        }


        $lanjutSekolahCount = Alumnus::whereNotNull('lnjt_sklh')->count();
        $tidakLanjutSekolahCount = Alumnus::where('lnjt_sklh', null)->orWhere('lnjt_sklh', '')->count();

        return view('m_dashboard.dashboard', compact('adminCount', 'alumniCount', 'tahunCount', 'lanjutSekolahCount','getTahun','alumniPerTahun','tidakLanjutSekolahCount','aktivasiCount'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use App\Models\Tahun;


class GrafikController extends Controller
{
    public function index()
    {
        $getTahun = Tahun::all();
        $alumniPerTahun = [];
        foreach ($getTahun as $tahun) {
            $alumniPerTahun[$tahun->tahun] = Alumnus::where('id_tahun', $tahun->tahun)->count() ?: 0;
        }


        $lanjutSekolahCount = Alumnus::whereNotNull('lnjt_sklh')->count();
        $tidakLanjutSekolahCount = Alumnus::where('lnjt_sklh', null)->orWhere('lnjt_sklh', '')->count();

        return view('m_grafik.index_grafik', compact('lanjutSekolahCount', 'tidakLanjutSekolahCount', 'getTahun', 'alumniPerTahun'));
    }
}

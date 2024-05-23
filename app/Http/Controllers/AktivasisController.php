<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Alumnus;
use App\Models\Aktivasi;
use App\Http\Requests\AktivasiRequest;

class AktivasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $aktivasis = Aktivasi::where('diterima', 0)->get();
        return view('m_aktivasi.index_aktivasi', ['aktivasis' => $aktivasis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('aktivasis.create');
    }



    public function show($id)
    {
        $aktivasi = Aktivasi::findOrFail($id);
        return view('aktivasis.show', ['aktivasi' => $aktivasi]);
    }


    public function edit($id)
    {
        $aktivasi = Aktivasi::findOrFail($id);
        return view('aktivasis.edit', ['aktivasi' => $aktivasi]);
    }


    public function update(Request $request, $id)
    {

        $confirmAlumnus = Aktivasi::findOrFail($id);
        $confirmAlumnus->diterima = 1;
        $confirmAlumnus->save();

        $alumnus = new Alumnus;
        $alumnus->name = $request->input('name');
        $alumnus->nisn = $request->input('nisn');
        $alumnus->password = $request->input('nisn');
        $alumnus->save();


        return to_route('aktivasis.index');

    }


    public function destroy($id)
    {
        $aktivasi = Aktivasi::findOrFail($id);
        $aktivasi->diterima = 2;
        $aktivasi->save();
        return to_route('aktivasis.index');
    }


    public function get_download($id)
    {
        $filePath = storage_path('app/public/aktivasi/' . $id . '.pdf');
        return response()->download($filePath);

    }
}

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
        $aktivasis = Aktivasi::all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  AktivasiRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $aktivasi = Aktivasi::findOrFail($id);
        return view('aktivasis.show', ['aktivasi' => $aktivasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $aktivasi = Aktivasi::findOrFail($id);
        return view('aktivasis.edit', ['aktivasi' => $aktivasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AktivasiRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $alumnus = new Alumnus;
        $alumnus->name = $request->input('name');
        $alumnus->nisn = $request->input('nisn');
        $alumnus->password = $request->input('nisn');
        $alumnus->save();

        $deleteAlumnus = Aktivasi::findOrFail($id);
        $deleteAlumnus->delete();


        return to_route('aktivasis.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $aktivasi = Aktivasi::findOrFail($id);
        $aktivasi->delete();

        return to_route('aktivasis.index');
    }
}

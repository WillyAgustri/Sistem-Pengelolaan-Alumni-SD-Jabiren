<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Tahun;
use App\Http\Requests\TahunRequest;

class TahunsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tahuns= Tahun::all();
        return view('tahuns.index', ['tahuns'=>$tahuns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tahuns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TahunRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TahunRequest $request)
    {
        $tahun = new Tahun;
		$tahun->id_tahun = $request->input('id_tahun');
		$tahun->tahun = $request->input('tahun');
        $tahun->save();

        return to_route('tahuns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $tahun = Tahun::findOrFail($id);
        return view('tahuns.show',['tahun'=>$tahun]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $tahun = Tahun::findOrFail($id);
        return view('tahuns.edit',['tahun'=>$tahun]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TahunRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TahunRequest $request, $id)
    {
        $tahun = Tahun::findOrFail($id);
		$tahun->id_tahun = $request->input('id_tahun');
		$tahun->tahun = $request->input('tahun');
        $tahun->save();

        return to_route('tahuns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tahun = Tahun::findOrFail($id);
        $tahun->delete();

        return to_route('tahuns.index');
    }
}

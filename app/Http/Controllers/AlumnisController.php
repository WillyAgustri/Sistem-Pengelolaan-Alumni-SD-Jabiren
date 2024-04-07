<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Alumnus;
use App\Http\Requests\AlumnusRequest;

class AlumnisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $alumnis= Alumnus::all();
        return view('alumnis.index', ['alumnis'=>$alumnis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('alumnis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlumnusRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AlumnusRequest $request)
    {
        $alumnus = new Alumnus;
		$alumnus->name = $request->input('name');
		$alumnus->nisn = $request->input('nisn');
		$alumnus->id_tahun = $request->input('id_tahun');
		$alumnus->j_kelamin = $request->input('j_kelamin');
		$alumnus->tmpt_lahir = $request->input('tmpt_lahir');
		$alumnus->tgl_lahir = $request->input('tgl_lahir');
		$alumnus->phone_num = $request->input('phone_num');
		$alumnus->alamat = $request->input('alamat');
		$alumnus->foto = $request->input('foto');
		$alumnus->password = $request->input('password');
        $alumnus->save();

        return to_route('alumnis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $alumnus = Alumnus::findOrFail($id);
        return view('alumnis.show',['alumnus'=>$alumnus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $alumnus = Alumnus::findOrFail($id);
        return view('alumnis.edit',['alumnus'=>$alumnus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AlumnusRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AlumnusRequest $request, $id)
    {
        $alumnus = Alumnus::findOrFail($id);
		$alumnus->name = $request->input('name');
		$alumnus->nisn = $request->input('nisn');
		$alumnus->id_tahun = $request->input('id_tahun');
		$alumnus->j_kelamin = $request->input('j_kelamin');
		$alumnus->tmpt_lahir = $request->input('tmpt_lahir');
		$alumnus->tgl_lahir = $request->input('tgl_lahir');
		$alumnus->phone_num = $request->input('phone_num');
		$alumnus->alamat = $request->input('alamat');
		$alumnus->foto = $request->input('foto');
		$alumnus->password = $request->input('password');
        $alumnus->save();

        return to_route('alumnis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $alumnus = Alumnus::findOrFail($id);
        $alumnus->delete();

        return to_route('alumnis.index');
    }
}

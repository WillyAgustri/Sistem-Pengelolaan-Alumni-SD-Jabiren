<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use File;
use App\Models\Alumnus;
use App\Models\Tahun;
use Illuminate\Http\Request;
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
        $tahuns = Tahun::all();
        $alumnis = Alumnus::all();
        return view('m_alumni.index_alumni', [
            'tahuns' => $tahuns,
            'alumnis' => $alumnis
        ]);
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nisn' => 'required|unique:alumnis',
            'id_tahun' => 'required',

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'nisn.unique' => 'NISN sudah terdaftar',
            'id_tahun.required' => 'Tahun tidak boleh kosong',


        ]);

        if ($validated) {
            $alumnus = new Alumnus;
            $alumnus->name = $request->input('name');
            $alumnus->nisn = $request->input('nisn');
            $alumnus->id_tahun = $request->input('id_tahun');
            $alumnus->j_kelamin = $request->input('j_kelamin');
            $alumnus->tmpt_lahir = $request->input('tmpt_lahir');
            $alumnus->tgl_lahir = $request->input('tgl_lahir');
            $alumnus->phone_num = $request->input('phone_num');
            $alumnus->alamat = $request->input('alamat');
            $alumnus->lnjt_sklh = $request->input('lnjt_sklh');
            if ($request->hasFile('foto')) {
                $imageName = time() . '.' . $request->file('foto')->extension();
                $request->file('foto')->move(public_path('images'), $imageName);
                $alumnus->foto = $imageName;
            } else {
                $alumnus->foto = 'Tidak ada Foto';
            }
            $alumnus->password = $request->input('nisn');
            // save data
            $alumnus->save();
            return to_route('alumnis.index');
        } else {
            return redirect()->route('alumnis.index')->withErrors($validated);
        }
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
        return view('alumnis.show', ['alumnus' => $alumnus]);
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
        return view('alumnis.edit', ['alumnus' => $alumnus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AlumnusRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'nisn' => 'required',
            'id_tahun' => 'required',


        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'id_tahun.required' => 'Tahun tidak boleh kosong',


        ]);

        if ($validated) {
            $alumnus = Alumnus::findOrFail($id);
            $alumnus->name = $request->input('name');
            $alumnus->nisn = $request->input('nisn');
            $alumnus->id_tahun = $request->input('id_tahun');
            $alumnus->j_kelamin = $request->input('j_kelamin');
            $alumnus->tmpt_lahir = $request->input('tmpt_lahir');
            $alumnus->tgl_lahir = $request->input('tgl_lahir');
            $alumnus->phone_num = $request->input('phone_num');
            $alumnus->alamat = $request->input('alamat');
            $alumnus->lnjt_sklh = $request->input('lnjt_sklh');



            if ($request->hasFile('foto')) {
                if (File::exists(public_path('images/' . $alumnus->foto))) {
                    File::delete(public_path('images/' . $alumnus->foto));
                }
                $imageName = time() . '.' . $request->file('foto')->extension();
                $request->file('foto')->move(public_path('images'), $imageName);
                $alumnus->foto = $imageName;
            } else {

            }
            $alumnus->save();

            return to_route('alumnis.index');
        }

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
        if (File::exists(public_path('images/' . $alumnus->foto))) {
            File::delete(public_path('images/' . $alumnus->foto));
        }
        $alumnus->delete();

        return to_route('alumnis.index');
    }


    public function reset_password($id)
    {

        $alumnus = Alumnus::findOrFail($id);
        $alumnus->password = $alumnus->nisn;
        // save data
        $alumnus->save();
        return to_route('alumnis.index');
    }

}

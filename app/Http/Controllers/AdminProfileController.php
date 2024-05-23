<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use File;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('m_profil.index_profil');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->phone_num = $request->phone_num;
        $admin->tgl_lahir = $request->tgl_lahir;
        $admin->save();

        return redirect()->route('setting-profil.index')->with('success', 'Profile berhasil diperbarui');
    }



    public function ganti_password(Request $request, $id)
    {
        $request->validate(
            [
                'password' => 'required|string|min:6|confirmed',
                'old_password' => 'required',

            ],
            [
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'old_password.required' => 'Password lama tidak boleh kosong',
                'password.min' => 'Password minimal 6 karakter',
                'password.required' => 'password tidak boleh kosong',
            ]
        );

        $admin = Admin::find($id);
        if (Hash::check($request->old_password, $admin->password)) {

            $admin->password = $request->password;
            $admin->save();
            return redirect()->route('setting-profil.index')->with('success', 'Password berhasil diperbarui');
        } else {
            return redirect()->route('setting-profil.index')->with('error', 'Password lama tidak sesuai');
        }
    }

    public function ganti_foto(Request $request, $id)
    {

        $admin = Admin::find($id);


        if ($request->hasFile('foto')) {
            if (File::exists(public_path('images/' . $admin->foto))) {
                File::delete(public_path('images/' . $admin->foto));
            }
            $imageName = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('images'), $imageName);
            $admin->foto = $imageName;
        } else {
            $admin->foto = 'Tidak ada Foto';
        }
        $admin->save();
        return redirect()->route('setting-profil.index')->with('success', 'Foto profil berhasil diperbarui');
    }

}


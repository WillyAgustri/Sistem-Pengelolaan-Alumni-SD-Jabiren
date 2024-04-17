<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use File;
use Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $admins = Admin::all();

        return view('m_admin.index_admin', ['admins' => $admins]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required',
            'password' => 'required|confirmed',

        ],[
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = $request->input('password');
        $admin->phone_num = $request->input('phone_num');
        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('images'), $imageName);
            $admin->foto = $imageName;
        } else {
            $admin->foto = 'Tidak ada Foto';
        }
        $admin->save();
        return to_route('admins.index');
    }

   
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', ['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required',
            'old_password' => 'required',
        ],[
            'username.required' => 'Username tidak boleh kosong',
            'old_password.required' => 'Password lama tidak boleh kosong',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);
        $admin = Admin::findOrFail($id);
        if (Hash::check($request->old_password, $admin->password)) {
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->phone_num = $request->input('phone_num');
        if ($request->hasFile('foto')) {
            if (File::exists(public_path('images/' . $admin->foto))) {
                File::delete(public_path('images/' . $admin->foto));
            }
            $imageName = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('images'), $imageName);
            $admin->foto = $imageName;
        }
        
        $admin->save();
    }
        else
        {
            return back()->with('error', 'Password lama tidak sesuai');
        }

        return to_route('admins.index');
    }

 
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        if (File::exists(public_path('images/' . $admin->foto))) {
            File::delete(public_path('images/' . $admin->foto));
        }
        $admin->delete();

        return to_route('admins.index');
    }
}

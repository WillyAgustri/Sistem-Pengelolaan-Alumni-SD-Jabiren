<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;

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
        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = $request->input('password');
        $admin->save();
        return to_route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
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
            'password' => 'required|confirmed',

        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = $request->input('password') ? $request->input('password') : $admin->password;
        $admin->phone_num = $request->input('phone_num');


        //Bakal Ku perbaiki
        $admin->foto = $request->input('foto');
        
        $admin->save();

        return to_route('admins.index');
    }

 
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return to_route('admins.index');
    }
}

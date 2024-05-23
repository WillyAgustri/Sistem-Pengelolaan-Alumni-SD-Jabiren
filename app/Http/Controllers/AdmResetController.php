<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdmResetController extends Controller
{
    public function reset_password(Request $request)
    {

        $check_validation = $request->validate([
            'username' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $get_user = Admin::where('username', $request->username)->where('tgl_lahir', $request->tgl_lahir)->first();

        if ($check_validation) {
            if (empty($get_user)) {

                return back()->with('success', 'Username atau Tanggal Lahir Salah!');
            } else
                $get_user->password = bcrypt($request->username);
            $get_user->save();
            return back()->with('success', 'Password berhasil direset,Silahkan Login Username dan Passowrd : ' . $request->username);
        } else {
            return back()->with('success', 'Password gagal direset');
        }
    }
}

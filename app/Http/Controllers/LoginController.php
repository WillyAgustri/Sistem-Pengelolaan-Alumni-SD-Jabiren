<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aktivasi;

class LoginController extends Controller
{

    public function index()
    {

        return view('login.page.login');

    }

    public function store(
        Request $request
    ) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->except(['_token']);

        if ($credentials)

            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('/dashboards');

            } else if (array_key_exists('username', $credentials)) {
                $credentials['nisn'] = $credentials['username'];
                unset($credentials['username']);



                if (Auth::guard('alumnis')->attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect('/dashboards-alumni');
                } else
                    return view('login.page.login')->with([
                        alert()->Error('NISN atau Password Salah!', 'Silahkan Masukan Kembali...')
                    ]);
            }
        return view('login.page.login');
    }
    public function aktivasi(Request $request)
    {

        $validator = $request->validate(
            [
                'nisn' => 'required',
                'name' => 'required',
                'brks_ijasah' => 'required',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'nisn.required' => 'NISN tidak boleh kosong',
                'brks_ijasah.required' => 'File Ijasah tidak boleh kosong',
            ]
        );
        if ($validator) {
            $aktivasi = new Aktivasi;
            $aktivasi->nisn = $request->input('nisn');
            $aktivasi->name = $request->input('name');
            $aktivasi->diterima = 0;
            $aktivasi->brks_ijasah = $request->input('brks_ijasah');
            if ($request->hasFile('brks_ijasah')) {
                $fileExtension = $request->file('brks_ijasah')->extension();
                if ($fileExtension == 'pdf' || $fileExtension == 'jpg') {
                    $brksIjasahName = time() . '.' . $fileExtension;
                    $request->file('brks_ijasah')->move(public_path('berkas-ijasah'), $brksIjasahName);
                    $aktivasi->brks_ijasah = $brksIjasahName;
                } else {
                    return back()->withErrors(['brks_ijasah' => 'File Ijasah Harus Berupa PDF atau JPG'])->withInput();
                }
            }
            $aktivasi->save();
            return back()->with([
                'success' => 'Berhasil Aktivasi Akun, Silahkan Tunggu Operator Kami Mengaktifkan Akun Anda...'
            ]);
        } else {
            return view('login.page.login')->with([
                alert()->Error('Gagal Aktivasi Akun', 'Silahkan Masukan Kembali...')
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


}

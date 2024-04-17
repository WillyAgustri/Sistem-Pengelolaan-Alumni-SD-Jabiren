<?php

namespace App\Http\Controllers;


use App\Models\Alumnus;

use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Hash;
use File;
use App\Models\Tahun;
class AlumniProfileController extends Controller
{
    public function index()
    {
        $tahuns = Tahun::all();
        return view('a_profil.index_profil', compact('tahuns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'id_tahun' => 'required',
            'nisn' => 'required',
            
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'id_tahun.required' => 'Tahun lulus tidak boleh kosong',
            'nisn.required' => 'NISN tidak boleh kosong',

        ]);

        if($request){
            $alumni = Alumnus::find($id);
            $alumni->nisn = $request->input('nisn');
            $alumni->name = $request->input('name');
            $alumni->id_tahun = $request->input('id_tahun');
            $alumni->tmpt_lahir = $request->input('tmpt_lahir');
            $alumni->tgl_lahir = $request->input('tgl_lahir');
            $alumni->j_kelamin = $request->input('j_kelamin');
            $alumni->alamat = $request->input('alamat');
            $alumni->phone_num = $request->input('phone_num');
            $alumni->lnjt_sklh = $request->input('lnjt_sklh');
            $alumni->save();
            return back()->with('success', 'Biodata Anda Berhasil Diperbarui');
        }
        else{
            return back()->with('error', 'Data alumni profil gagal diperbarui');
        }

       
   

    }

    public function ganti_foto(Request $request, $id){

        $request->validate(
            [
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'foto.required' => 'Inputan Foto profil harus diisi',
                'foto.image' => 'File harus berupa gambar',
            ]
        );

        $alumni = Alumnus::find($id);
        if ($request->hasFile('foto')) {
            if (File::exists(public_path('images/' . $alumni->foto))) {
                File::delete(public_path('images/' . $alumni->foto));
            }
            $imageName = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('images'), $imageName);
            $alumni->foto = $imageName;
        } else {
            $alumni->foto = 'Tidak ada Foto';
        }
        $alumni->save();
        return back()->with('foto_success', 'Foto profil berhasil diperbarui');
    }

    public function ganti_password(Request $request, $id){
       $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ],[
            'old_password.required' => 'Password lama tidak boleh kosong',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'password.required' => 'Password baru tidak boleh kosong',
        ]

        
    );

        if($request){
            $alumni = Alumnus::find($id);
            if (Hash::check($request->old_password, $alumni->password)) {
             
                $alumni->password = $request->input('password');
                $alumni->save();
                return back()->with('success', 'Password Berhasil Diperbarui');
            }else{
                return back()->with('error', 'Data alumni profil gagal diperbarui');
            }
        }
        return back()->with('error', 'Data alumni profil gagal diperbarui');


       
    }

}

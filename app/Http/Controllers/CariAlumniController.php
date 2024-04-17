<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnus;

class CariAlumniController extends Controller
{
    public function index(){
        return view('a_lihatAlumni.index_lihatAlumni');
    }



    public function cari(Request $request){

        $request->validate([
            'cari' => 'required',
        ]);

        $cari = $request->input('cari');
        $alumni = Alumnus::where('name', $cari)
            ->orWhere('id_tahun', $cari)
            ->get();
       
        if($alumni){
            return view('a_lihatAlumni.index_lihatAlumni',compact('alumni'));
        }
        return redirect('/cari-alumni')->with('error', 'Data Alumni Tidak Ditemukan');
    }

}

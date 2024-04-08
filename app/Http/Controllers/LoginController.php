<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    public function index(){
        
        return view('login.page.login');
        
    }
    
    public function store(Request $request
    ){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // $credentials = $request->all();
        $credentials = $request->except(['_token']);

        if($credentials)

        if (Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashboards');
        }
        else if (array_key_exists('username', $credentials)) {
            $credentials['nisn'] = $credentials['username'];
            unset($credentials['username']); 

            if($credentials){
                
            }
            
             if(Auth::guard('alumnis')->attempt($credentials)){
                $request->session()->regenerate();
                return redirect('alumni');
            }
            else return view('login.page.login')->with([
                alert()->Error('NISN atau Password Salah!', 'Silahkan Masukan Kembali...')
            ]);   
        }
        return view('login.page.login');
    
    } public function logout( Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('login.page.login')->with([alert()->Success('Anda Berhasil Logout')]);
    }

    
}

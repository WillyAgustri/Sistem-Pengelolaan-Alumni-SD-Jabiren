<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        $admin = Auth::guard('admin')->check();
        $alumnis = Auth::guard('alumnis')->check();

       

      
 if (!Auth::check()) {
            alert()->Error('Anda Tidak Memiliki Akses');

            return $request->expectsJson() ? null : route('login.index');
        }
        

       


        // return $request->expectsJson() ? null : route('login.index');
    }
}

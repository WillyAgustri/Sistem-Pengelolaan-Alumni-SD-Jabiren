<?php



namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        if (!Auth::check()) {
            alert()->Error('Anda Tidak Memiliki Akses');

            return redirect()->route('login.index');
        }

        $user = Auth::user();
        if ($user) {
            return $next($request);
        }

        return redirect()->route('login.index');
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        
        // Mengecek apakah role pengguna cocok dengan role yang diinginkan
        if ($user->role_id !== (int) $role) {
            // Redirect ke halaman sesuai role jika peran tidak sesuai
            return redirect()->route($this->getRedirectRoute($user->role_id));
        }

        return $next($request);
    }

    // Mendapatkan route yang sesuai dengan role
    private function getRedirectRoute($role_id)
    {
        switch ($role_id) {
            case 1:
                return 'siswa.dashboard';
            case 2:
                return 'guru.dashboard';
            default:
                return 'home';
        }
    }
}

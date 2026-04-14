<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    //cek role user
    public function handle(Request $request, Closure $next, ...$roles)
    {
        //jika belum login
        if (!Auth::check()) {
            return redirect('/login');
        }

        //jika role tidak sesuai
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'AKSES DITOLAK');
        }

        //lanjut ke halaman
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login.form');
        }

        if ($role) {
            // Puede recibir un rol o roles separados por coma
            $roles = explode('|', $role);
            if (!in_array($user->rol, $roles)) {
                abort(403, 'No tienes permiso para acceder');
            }
        }


        return $next($request);
    }


}

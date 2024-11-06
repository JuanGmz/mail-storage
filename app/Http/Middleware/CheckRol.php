<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRol {
    public function handle(Request $request, Closure $next, $roles) {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $userRole = Auth::user()->rol;
        $rolesArray = explode(',', $roles);

        if (!in_array($userRole, $rolesArray)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurMiddleware {
    public function handle(Request $request, Closure $next) {
        if (Auth::check() && Auth::user()->isUser()) {
            return $next($request);
        }
        return redirect('/'); // Rediriger si ce n'est pas un utilisateur
    }
}

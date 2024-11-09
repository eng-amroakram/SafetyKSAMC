<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class onlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if ($user && auth()->check()) {
            if ($user->type == "admin" || $user->type == "superadmin") {
                return $next($request);
            } else {
                return redirect()->route('web.home');
            }
        }

        return $next($request);
    }
}

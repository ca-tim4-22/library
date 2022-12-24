<?php

namespace App\Http\Middleware\InactiveUsers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InactiveUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $URL = url()->current();
        if (Auth::guest() || Auth::user()->active == 1 || str_contains($URL, 'potvrdite-nalog')) {
            return $next($request);
        }
        
        return response()->view('maintenance.access_denied')->setStatusCode(403);
    }
}

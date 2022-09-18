<?php

namespace App\Http\Middleware\SeeYouLater;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeeYouLaterMiddleware
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
        if (!Auth::check()) {
            return $next($request);
        }
        
        return response()->view('maintenance.access_denied')->setStatusCode(403);
    }
}

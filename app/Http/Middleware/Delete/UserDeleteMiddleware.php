<?php

namespace App\Http\Middleware\Delete;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDeleteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type->id == 3) {
            // return response()->view('success.success')->setStatusCode(200);
            return $next($request);
        } else {
            return response()->view('maintenance.access_denied')
                ->setStatusCode(403);
        }
    }
}

<?php

namespace App\Http\Middleware\Delete;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationApprovalMiddleware
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
        if (Auth::check() && Auth::user()->type->id == 3 || Auth::user()->type->id == 2) {
            return response()->view('success.success')->setStatusCode(200);
        } else {
            return response()->view('maintenance.access_denied')->setStatusCode(403);
        }
    }
}

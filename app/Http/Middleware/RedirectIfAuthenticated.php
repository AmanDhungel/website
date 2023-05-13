<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if ($guard == 'teacher' && Auth::guard($guard)->check()) {
                return redirect('/teacher/dashboard');
            }
            if ($guard == 'student' && Auth::guard($guard)->check()) {
                return redirect('/student/dashboard');
            }
            if ($guard == 'parent' && Auth::guard($guard)->check()) {
                return redirect('/parent/dashboard');
            }
            if (Auth::guard($guard)->check()) {
                //return redirect()->route($guard.'.dashboard');
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}

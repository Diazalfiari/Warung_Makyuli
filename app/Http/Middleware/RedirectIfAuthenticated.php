<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // If the user is an admin, redirect to the admin dashboard
                if (Auth::guard($guard)->user()->isAdmin()) {
                    return redirect()->route('dashboard.index');
                }

                // Otherwise, redirect to the home page
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}

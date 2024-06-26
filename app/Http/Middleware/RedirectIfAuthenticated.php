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
                switch ($guard) {
                    case 'web':
                        return redirect(RouteServiceProvider::USER_HOME); // Redirect users to user dashboard
                    case 'mentor':
                        return redirect(RouteServiceProvider::MENTOR_HOME); // Redirect mentors to mentor dashboard
                    case 'admin':
                        return redirect(RouteServiceProvider::ADMIN_HOME); // Redirect admins to admin dashboard
                    default:
                        // return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}

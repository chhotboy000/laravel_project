<?php

namespace App\Http\Middleware;

use App\Models\patient;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class patientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            if(auth::guard('patient'))
            {
                return $next($request);
            }
        }
        else
        {
            Auth::logout();
            return redirect('login');
        }
    }
}


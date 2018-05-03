<?php

namespace App\Http\Middleware;

use Closure;

class checkStudentLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!session('student') &&  !$request->is('student/login')) {
            return redirect('student/login');
        }

        return $next($request);
    }
}

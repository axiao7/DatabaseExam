<?php

namespace App\Http\Middleware;

use Closure;

class checkTeacherLogin
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
        if (!session('teacher') &&  !$request->is('teacher/login')) {
            return redirect('teacher/login');
        }
        return $next($request);
    }
}

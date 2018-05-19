<?php

namespace App\Http\Middleware;

use Closure;

class OnlineTest
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
        if (time() < strtotime('2018-05-12')){
            return redirect('student');
        }

        return $next($request);
    }
}

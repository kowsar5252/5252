<?php

namespace App\Http\Middleware;

use Closure;

class StatusSetting
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
      if(auth()->user()->status == 1){
       return $next($request);
       }
       return redirect('manager/dashboard');
    }
}

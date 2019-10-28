<?php

namespace App\Http\Middleware;

use Closure;

class Lang
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
      if ($request->lang <> '') {
            app()->setLocale($request->lang);
        }else{
            app()->setLocale("en");
        }
        // app()->setlocale(app('lang'));
        return $next($request);
    }
}

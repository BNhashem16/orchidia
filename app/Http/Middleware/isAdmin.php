<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
      if (auth()::check() && Auth::user()->isAdmin == 1) {
        return $next($request);
      }

      return Redirect()->to('/dashboard/login');
    }
}
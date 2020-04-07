<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $user = \Auth::user();

        if (!$user || (!$user->isAdmin() && !$user->isManager())) {
            return redirect('/login');
        }
        return $next($request);
    }
}

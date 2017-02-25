<?php

namespace App\Http\Middleware;

use Closure;

class UserAdditionalInfo
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
        $role = $request->user()->getRole();
        $request['type'] = $role;
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CanBeDeleted
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
        $user = \App\Core\Models\User::findOrFail($request->id);
        if($user->hasRole('Admin')) {
            return response()->json(['msg' => 'User cannot be deleted while he is admin'], 500);
        }
        return $next($request);
    }
}

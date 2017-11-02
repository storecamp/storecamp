<?php

namespace App\Http\Middleware;

use App\Core\Models\Role;
use Closure;

class ShouldNotBeDefaultRole
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roleId = $request->id;
        $role = app(Role::class)->find($roleId);
        if ($role->name === 'Admin' || $role->name === 'Client') {
            \Flash::warning('The given role is default for the app. Try edit or delete another non default role');

            return redirect()->back();
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Core\Models\User;
use Closure;

class ShouldNotBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()) {
            $userId = $request->id;
            $user = User::find($userId);
            if ($user->hasRole('Admin')) {
                \Flash::warning("The given user with role <b>Admin</b> is default for the app. <span class='text-danger'>To delete user change his role first!!!</span>");

                return redirect()->to(\URL::previous());
            }
        }

        return $next($request);
    }
}

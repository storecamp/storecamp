<?php

namespace App\Http\Middleware;

use App\Core\Access\AccessRole;
use App\Core\Repositories\UserRepository;
use Closure;

class AdminsShouldLeft
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()) {
            $roleId = $request->role;
            $role = AccessRole::find($roleId);
            if($role->name == "Admin") {
                return $next($request);
            }
            $userId = $request->id;
            $user = $this->userRepository->find($userId);
            if(!$user->hasRole("Admin")) {
                return $next($request);
            }
            if($user->getUsersByRole("Admin")->count() <= 1) {
                \Flash::warning("The given user with role <b>Admin</b> is default for the app. <span class='text-danger'>To change user settings add one more admin!!!</span>");
                return redirect()->back();
            }
        }
        return $next($request);
    }
}

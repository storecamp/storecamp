<?php

namespace App\Http\Middleware;

use App\Core\Access\AccessRole;
use App\Core\Repositories\UserRepository;
use Closure;

class ShouldNotBeAdmin
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
            $userId = $request->id;
            $user = $this->userRepository->find($userId);
            if ($user->hasRole('Admin')) {
                \Flash::warning("The given user with role <b>Admin</b> is default for the app. <span class='text-danger'>To delete user change his role first!!!</span>");
                return redirect()->back();
            }


        }
        return $next($request);
    }
}

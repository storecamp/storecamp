<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;

class CheckIfUserBanned
{
    /**
     * CheckIfUserBanned constructor.
     */
    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

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
        $response = $next($request);
        if (!$this->authManager->guest() && ($this->authManager->user()->banned == true)) {
            $username = $this->authManager->user()->name;
            $this->authManager->logout();
            \Toastr::error('you are banned', $title = $username, $options = []);

            return redirect()->to('/');
        }

        return $response;
    }
}

<?php

namespace App\Core\Access\Middleware;

/*
 * This file is part of Access,
 * a role & permission management solution for Syrinx.
 *
 * @license MIT
 * @package App\Core\Access
 */

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AccessPermission
{
    protected $auth;

    /**
     * Creates a new instance of the middleware.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure                  $next
     * @param  $permissions
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        if ($this->auth->guest() || !$request->user()->may(explode('|', $permissions))) {
            abort(403);
        }

        return $next($request);
    }
}

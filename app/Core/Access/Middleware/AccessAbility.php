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

class AccessAbility
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
     * @param $roles
     * @param $permissions
     * @param bool $validateAll
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $roles, $permissions, $validateAll = false)
    {
        if ($this->auth->guest() || !$request->user()->ability(explode('|', $roles), explode('|', $permissions), ['validate_all' => $validateAll])) {
            abort(403);
        }

        return $next($request);
    }
}

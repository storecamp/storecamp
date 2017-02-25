<?php

namespace App\Http;

use App\Core\Access\Middleware\AccessPermission;
use App\Core\Access\Middleware\AccessRole;
use App\Http\Middleware\BelongsToUserOrAdmin;
use App\Http\Middleware\FolderLocked;
use App\Http\Middleware\UserAdditionalInfo;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'jwt.auth' => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
        'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,
        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
        'role' => AccessRole::class,
        'permission' => AccessPermission::class,
        'user.additional' => UserAdditionalInfo::class,
        'shouldBeUnique' => \App\Http\Middleware\ElementShouldBeUnique::class,
        'notDefaultRole' => \App\Http\Middleware\ShouldNotBeDefaultRole::class,
        'notAdmin' => \App\Http\Middleware\ShouldNotBeAdmin::class,
        'shouldLeftAdmin' => \App\Http\Middleware\AdminsShouldLeft::class,
        'folderLocked' => FolderLocked::class,
        'belongsToUserOrAdmin' => BelongsToUserOrAdmin::class
    ];
}

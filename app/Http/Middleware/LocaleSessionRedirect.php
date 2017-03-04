<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 04.03.2017
 * Time: 23:18
 */

namespace App\Http\Middleware;


use Closure;

class LocaleSessionRedirect extends \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect
{
    public function handle($request, Closure $next)
    {
        if (env('APP_ENV') !== 'testing') {
            return parent::handle($request, $next);
        } else {
            return $next($request);
        }
    }
}
<?php

namespace App\Http\Middleware;

use Closure;

class DetectBrowserLanguage
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
        $lang = \Cookie::get('lang');
        if ($lang && in_array($lang, config('app.languages'))) {
            config('app.locale', $lang);
        } else {
            $browser_lang = ! empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
            $browser_lang = substr($browser_lang, 0, 2);
            $userLang = (in_array($browser_lang, config('app.languages'))) ? $browser_lang : config('app.locale');
            config('app.locale', $userLang);
            app()->setLocale($userLang);
        }

        return $next($request);
    }
}

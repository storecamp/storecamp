<?php

if (!function_exists('resolveModelName')) {
    /**
     * @param $model
     * @return string
     */
    function resolveModelName($model): string
    {
        $reflection = new \ReflectionClass($model);
        return $reflection->getShortName();

    }
}

if (!function_exists('determineActiveDBandResolveDown')) {

    /**
     * @param $migrationClass
     * @return mixed
     */
    function determineActiveDBandResolveUp($migrationClass)
    {

        if (env('database.default') == 'mysql') {

            return $migrationClass::mySQLDB();

        }

        if (config('database.default') == 'pgsql') {

            return $migrationClass::postgreSQL();
        }
    }
}

if (!function_exists('determineActiveDBandResolveDown')) {

    /**
     * @param $migrationClass
     * @return mixed
     */
    function determineActiveDBandResolveDown($migrationClass)
    {

        if (config('database.default') == 'mysql') {
            return $migrationClass::downmySQLDB();
        }

        if (config('database.default') == 'pgsql') {

            return $migrationClass::downpostgreSQL();
        }
    }
}

if (!function_exists('ruTolat')) {

    /**
     * @param $str
     * @return string
     */
    function ruTolat(string $str): string
    {
        $tr = array(
            "А" => "a", "Б" => "b", "В" => "v", "Г" => "g", "Д" => "d",
            "Е" => "e", "Ё" => "yo", "Ж" => "zh", "З" => "z", "И" => "i",
            "Й" => "j", "К" => "k", "Л" => "l", "М" => "m", "Н" => "n",
            "О" => "o", "П" => "p", "Р" => "r", "С" => "s", "Т" => "t",
            "У" => "u", "Ф" => "f", "Х" => "kh", "Ц" => "ts", "Ч" => "ch",
            "Ш" => "sh", "Щ" => "sch", "Ъ" => "", "Ы" => "y", "Ь" => "",
            "Э" => "e", "Ю" => "yu", "Я" => "ya", "а" => "a", "б" => "b",
            "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "yo",
            "ж" => "zh", "з" => "z", "и" => "i", "й" => "j", "к" => "k",
            "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p",
            "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f",
            "х" => "kh", "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch",
            "ъ" => "", "ы" => "y", "ь" => "", "э" => "e", "ю" => "yu",
            "я" => "ya", " " => "-", "." => "", "," => "", "/" => "-",
            ":" => "", ";" => "", "—" => "", "–" => "-"
        );
        return strtr($str, $tr);
    }

}

if (!function_exists('formatBytes')) {

    /**
     * @param $bytes
     * @param int $precision
     * @return string
     */
    function formatBytes($bytes, $precision = 2): string
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
//         $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

if (!function_exists('buildSelect')) {

    /**
     * @param $actionUrl
     * @param $attrName
     * @param $multiple
     * @param array $data
     * @param array $selected
     * @param null $class
     * @param null $placeholder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function buildSelect($actionUrl, $attrName, bool $multiple, $data = [], $selected = [], $class = null, $placeholder = null)
    {
        $selector = new \App\Core\Components\Select\SelectBuilder();

        return $selector->render($actionUrl, $attrName, $multiple, $data, $selected, $class, $placeholder);
    }
}
if (!function_exists('checkRoute')) {

    /**
     * @param string $route
     * @return bool
     */
    function checkRoute(string $route): bool
    {
        $routes = \Route::getRoutes()->getRoutes();
        foreach ($routes as $r) {
            if ($r->getUri() == $route) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('active_class')) {
    /**
     * Get the active class if the condition is not falsy
     *
     * @param        $condition
     * @param string $activeClass
     * @param string $inactiveClass
     *
     * @return string
     */
    function active_class($condition, $activeClass = 'active', $inactiveClass = '')
    {
        return app('active')->getClassIf($condition, $activeClass, $inactiveClass);
    }
}

if (!function_exists('if_uri')) {
    /**
     * Check if the URI of the current request matches one of the specific URIs
     *
     * @param array|string $uris
     *
     * @return bool
     */
    function if_uri($uris)
    {
        return app('active')->checkUri($uris);
    }
}

if (!function_exists('if_uri_pattern')) {
    /**
     * Check if the current URI matches one of specific patterns (using `str_is`)
     *
     * @param array|string $patterns
     *
     * @return bool
     */
    function if_uri_pattern($patterns)
    {
        return app('active')->checkUriPattern($patterns);
    }
}

if (!function_exists('if_query')) {
    /**
     * Check if one of the following condition is true:
     * + the value of $value is `false` and the current querystring contain the key $key
     * + the value of $value is not `false` and the current value of the $key key in the querystring equals to $value
     * + the value of $value is not `false` and the current value of the $key key in the querystring is an array that
     * contains the $value
     *
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    function if_query($key, $value)
    {
        return app('active')->checkQuery($key, $value);
    }
}

if (!function_exists('if_route')) {
    /**
     * Check if the name of the current route matches one of specific values
     *
     * @param array|string $routeNames
     *
     * @return bool
     */
    function if_route($routeNames)
    {
        return app('active')->checkRoute($routeNames);
    }
}

if (!function_exists('if_route_pattern')) {
    /**
     * Check the current route name with one or some patterns
     *
     * @param array|string $patterns
     *
     * @return bool
     */
    function if_route_pattern($patterns)
    {
        return app('active')->checkRoutePattern($patterns);
    }
}

if (!function_exists('if_route_param')) {
    /**
     * Check if the parameter of the current route has the correct value
     *
     * @param $param
     * @param $value
     *
     * @return bool
     */
    function if_route_param($param, $value)
    {
        return app('active')->checkRouteParam($param, $value);
    }
}

if (!function_exists('if_action')) {
    /**
     * Return 'active' class if current route action match one of provided action names
     *
     * @param array|string $actions
     *
     * @return bool
     */
    function if_action($actions)
    {
        return app('active')->checkAction($actions);
    }
}

if (!function_exists('if_controller')) {
    /**
     * Check if the current controller class matches one of specific values
     *
     * @param array|string $controllers
     *
     * @return bool
     */
    function if_controller($controllers)
    {
        return app('active')->checkController($controllers);
    }
}

if (!function_exists('current_controller')) {
    /**
     * Get the current controller class
     *
     * @return string
     */
    function current_controller()
    {
        return app('active')->getController();
    }
}

if (!function_exists('current_method')) {
    /**
     * Get the current controller method
     *
     * @return string
     */
    function current_method()
    {
        return app('active')->getMethod();
    }
}

if (!function_exists('current_action')) {
    /**
     * Get the current action string
     *
     * @return string
     */
    function current_action()
    {
        return app('active')->getAction();
    }
}

if (!function_exists('cartNumberFormat')) {
    /**
     * Get the Formated number
     *
     * @param $value
     * @param null $decimals
     * @param null $decimalPoint
     * @param null $thousandSeperator
     * @return string
     */
    function cartNumberFormat($value, $decimals = null, $decimalPoint = null, $thousandSeperator = null)
    {
        if (is_null($decimals)) {
            $decimals = is_null(config('cart.format.decimals'))
                ? 2 : config('cart.format.decimals');
        }
        if (is_null($decimalPoint)) {
            $decimalPoint = is_null(config('cart.format.decimal_point'))
                ? '.' : config('cart.format.decimal_point');
        }
        if (is_null($thousandSeperator)) {
            $thousandSeperator = is_null(config('cart.format.thousand_seperator'))
                ? ',' : config('cart.format.thousand_seperator');
        }
        return number_format($value, $decimals, $decimalPoint, $thousandSeperator);
    }
}
if (!function_exists('shopFormat')) {
    function shopFormat(string $value)
    {
        return preg_replace(
            [
                '/:symbol/',
                '/:price/',
                '/:currency/'
            ],
            [
                config('shop.currency_symbol'),
                $value,
                config('shop.currency')
            ],
            config('shop.display_price_format')
        );
    }
}

if(!function_exists('pushParentCategoryBreadcrumbs')){
    /**
     * @param $category
     * @param $breadcrumbs
     */
    function pushParentCategoryBreadcrumbs($category, $breadcrumbs)
    {
        while ($category->parent_id != null) {
            $newParent = app('App\Core\Repositories\CategoryRepository')->find($category->parent_id);
            $breadcrumbs->push($newParent->name, route('site::products::index', [$newParent->unique_id]));
            return pushParentCategoryBreadcrumbs($newParent, $breadcrumbs);
        }
        return;
    }
}

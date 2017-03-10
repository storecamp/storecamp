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

if (!function_exists('formatBytes')) {

    /**
     * @param $bytes
     * @param int $precision
     * @return string
     */
    function formatBytes($bytes, $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

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

if (!function_exists('cartNumberFormat')) {
    /**
     * Get the Formated number.
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
            $decimals = is_null(config('sales.format.decimals'))
                ? 2 : config('sales.format.decimals');
        }
        if (is_null($decimalPoint)) {
            $decimalPoint = is_null(config('sales.format.decimal_point'))
                ? '.' : config('sales.format.decimal_point');
        }
        if (is_null($thousandSeperator)) {
            $thousandSeperator = is_null(config('sales.format.thousand_seperator'))
                ? ',' : config('sales.format.thousand_seperator');
        }

        return shopFormat(number_format($value, $decimals, $decimalPoint, $thousandSeperator));
    }
}

if (!function_exists('shopFormat')) {
    /**
     * @param string $value
     * @return string
     */
    function shopFormat(string $value)
    {
        return \App\Core\Logic\ShopSystem::format($value);
    }
}

if (!function_exists('pushParentCategoryBreadcrumbs')) {
    /**
     * @param $category
     * @param $breadcrumbs
     * @return mixed
     */
    function pushParentCategoryBreadcrumbs($category, $breadcrumbs)
    {
        while ($category->parent_id != null) {
            $newParent = app('App\Core\Repositories\CategoryRepository')->find($category->parent_id);
            $breadcrumbs->push($newParent->name, route('site::products::index', [$newParent->unique_id]));

            return pushParentCategoryBreadcrumbs($newParent, $breadcrumbs);
        }
    }
}

if (!function_exists('getCategoryFullPath')) {
    /**
     * @param \App\Core\Models\Category $category
     * @param string $type
     * @return string
     */
    function getCategoryFullPath(\App\Core\Models\Category $category, string $type = 'string')
    {
        return \App\Core\Logic\CategorySystem::getCategoryFullPath($category, $type);
    }
}

if (!function_exists('getFilesByFormat')) {
    /**
     * @param string $root
     * @param string $format
     * @param bool $skipFormatEnding
     * @return array
     */
    function getFilesByFormat(string $root, string $format, bool $skipFormatEnding = false): array
    {
        $files = app('App\Drivers\FolderToDb\SynchronizerInterface')
            ->getFilesByFormat($root, $format, $skipFormatEnding);

        return $files;
    }
}

if (!function_exists('getBaseClassName')) {
    /**
     * @param $class
     * @param bool $snake
     * @return mixed|string
     */
    function getBaseClassName($class, $snake = true)
    {
        $path = explode('\\', get_class($class));
        if ($snake) {
            return \Illuminate\Support\Str::snake(array_pop($path));
        } else {
            return array_pop($path);
        }
    }
}

if (!function_exists('getFileNames')) {
    /**
     * @param $root
     * @return array
     */
    function getFileNames($root)
    {
        $files = \File::allFiles($root);
        $filesArr = [];
        foreach ($files as $file) {
            $extension = $file->getExtension();
            $fileName = explode('.' . $extension, $file->getBasename());
            $filesArr[] = $fileName[0];
        }

        return $filesArr;
    }
}


if (!function_exists('getPrevValue')) {
    /**
     * @param $key
     * @param $array
     * @return null
     */
    function getPrevValue($key, $array)
    {
        $key = array_search($key, $array);
        if (!isset($array[$key])) {
            return null;
        }
        $prevK = NULL;
        foreach ($array as $k => $v) {
            if ($k === $key) {
                return $prevK;
            }
            $prevK = $array[$k];
        }
        return $prevK;
    }
}

if (!function_exists('getNextValue')) {
    /**
     * @param $key
     * @param $array
     * @return null
     */
    function getNextValue($key, $array)
    {
        $key = array_search($key, $array);
        if (!isset($array[$key])) {
            return null;
        }
        $nextK = NULL;
        foreach ($array as $k => $v) {
            if ($k === $key) {
                return $nextK;
            }
            if (!isset($array[$k + 2])) {
                return null;
            } else {
                $nextK = $array[$k + 2];
            }
        }
        return $nextK;
    }
}

if (!function_exists('getAllPreviousValues')) {
    /**
     * @param $key
     * @param $array
     * @return array|null
     */
    function getAllPreviousValues($key, $array): ?array
    {
        $key = array_search($key, $array);
        if (!isset($array[$key])) {
            return null;
        }
        $prevK = null;
        foreach ($array as $k => $v) {
            if ($k === $key) {
                return $prevK;
            }
            $count = count($array);
            for ($i=$key; $i < $count; $i++){
                unset($array[$i]);
            }
            $prevK = $array;
        }
        return $prevK;
    }
}

if (!function_exists('setting')) {
    /**
     * @param $key
     * @param null $default
     * @return null
     */
    function setting($key, $default = null)
    {
        $setting = app('\App\Core\Models\Settings');
        return $setting->get($key, $default);
    }
}

if (!function_exists('settingSet')) {
    /**
     * @param $key
     * @param null $value
     * @return $this
     */
    function settingSet($key, $value = null)
    {
        $setting = app('\App\Core\Models\Settings');
        return $setting->set($key, $value);
    }
}

if (!function_exists('menu')) {
    /**
     * @param $key
     * @param string $type
     * @param array $options
     * @return \Illuminate\Support\HtmlString
     */
    function menu($key, $type = "default", array $options = [])
    {
        $menu = app('\App\Core\Components\Menu\MenuDbBuilder');
        return $menu->renderFromDb($key, $type, $options);
    }
}
<?php

namespace App\Core\Support\Framework;


class Application extends \Illuminate\Foundation\Application
{
    /**
     * Wrap a Closure such that it is shared.
     *
     * @param  \Closure $closure
     * @return \Closure
     */
    public function share(\Closure $closure)
    {
        return function ($container) use ($closure) {
            // We'll simply declare a static variable within the Closures and if it has
            // not been set we will execute the given Closures to resolve this value
            // and return it back to these consumers of the method as an instance.
            static $object;
            if (is_null($object)) {
                $object = $closure($container);
            }
            return $object;
        };
    }
}
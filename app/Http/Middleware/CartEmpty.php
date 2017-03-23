<?php

namespace App\Http\Middleware;

use Closure;

class CartEmpty
{
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
        $cart = session('cart');
        if (empty($cart)) {
            \Flash::warning('Sorry but your Cart not found');

            return redirect()->back();
        }

        return $next($request);
    }
}

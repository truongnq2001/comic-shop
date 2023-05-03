<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('cart') || count(session('cart')) === 0) {
            return redirect()->route('home')->withErrors(['cart' => 'Your cart is empty']);
        }

        return $next($request);
    }
}

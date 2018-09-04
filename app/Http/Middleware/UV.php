<?php

namespace App\Http\Middleware;

use Closure;

class UV
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \App\Models\count::create([
            'host' => $_SERVER['REMOTE_ADDR'],
        ]);
        return $next($request);
    }
}

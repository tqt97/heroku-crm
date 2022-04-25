<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SaveLastActionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
    public function terminate($request, $response)
    {
        if ($request->user()) {
            $request->user()->update(['last_action_at' => now()]);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class HighLevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();


        if ($user && !in_array(1, $user->roles->pluck('id')->toArray()) && !in_array(2, $user->roles->pluck('id')->toArray())) {
            abort(403, "You don't have Dashboard access.");
        }

        return $next($request);
    }
}

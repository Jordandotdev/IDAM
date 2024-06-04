<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyOwnerMiddlerware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user &&  !in_array(4, $user->roles->pluck('id')->toArray())) {
            return redirect('/')->with('error', "You don't have Admin access.");
        }
        // Error to be addressed that the page should
        // have a abort(403, "You don't have Admin access.");
        //temporarily added the route

        return $next($request);
    }
}

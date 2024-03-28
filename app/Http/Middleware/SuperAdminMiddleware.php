<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Enums\Role;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        dd($user->roles);

        if ($user && $user->role !== Role::SuperAdmin) {
            return redirect('/')->with('error', "You don't have Superadmin access.");
        }

        // Error to be addressed that the page should
        // have a abort(403, "You don't have Superadmin access.");
        //temporarily added the route

        return $next($request);
    }
}
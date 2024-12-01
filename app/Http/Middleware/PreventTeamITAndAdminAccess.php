<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventTeamITAndAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user && ($user->hasRole('admin') || $user->hasRole('teamIT'))) {
            return redirect()->route($user->hasRole('admin') ? 'admin.dashboard' : 'team');
        }

        return $next($request);
    }
}

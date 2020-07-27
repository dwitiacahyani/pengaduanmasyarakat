<?php

namespace App\Http\Middleware;

use Closure;

class CheckWarga
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user->level != 'warga') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;

class AccessMiddleware
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
        $user = \Helper::getSessionCachedUser();
        if (!Customer::where('openid', $user['openid'])->get()) {
            return redirect('/register/create');
        }
        return $next($request);
    }

} /*class*/

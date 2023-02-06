<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class Authenticate extends Middleware
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $role1 = null, $role2 = null, $role3 = null)
    {
        $user = app('auth')->user();
        
        if ('active' != $user->status) {
            app('auth')->logout();
            throw new UnauthorizedException();
        }

        if ('super_admin' != $user->decentralization && $role1 != null && $role1 != $user->decentralization 
            && ($role2 == null || $role2 != $user->decentralization)
            && ($role3 == null || $role3!= $user->decentralization)) {
            throw new UnauthorizedException();
        }

        return $next($request);
    }

    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return string|null
    //  */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }
}

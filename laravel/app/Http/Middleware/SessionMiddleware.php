<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class SessionMiddleware
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
        $this->authenticate();

        return $next($request);
    }

    protected function authenticate()
    {
        if (Session::has('email')) {
            return true;
        }

        throw new AuthenticationException('Unauthenticated.', [Session::get('email')]);
    }
}

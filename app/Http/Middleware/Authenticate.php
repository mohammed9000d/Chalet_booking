<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($this->auth->guard('admin')) {
            return route('admin.login_view');
        }
        elseif ($this->auth->guard('owner')) {
            return route('owner.login_view');
        }
        else {
            return route('user.login_view');
        }
    }
}

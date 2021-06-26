<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        // return $next($request);

        switch ($guard){
            case  'admin':
                if(Auth::guard($guard)->check()){
                    $admin = Auth::guard($guard)->user();
                    if($admin->status == 'Active'){
                        return redirect(route('admin.dashboard'));
                    }else{
                        //
                    }
                }
            case 'users':
                if(Auth::guard($guard)->check()){
                    $user = Auth::guard($guard)->user();
                    if($user->status == 'Active'){
                        return redirect(route('website.index'));
                    }else{
                        //
                    }
                }

            case 'owner':
                if(Auth::guard($guard)->check()){
                    $owner = Auth::guard($guard)->user();
                    if($owner->status == 'Active'){
                        return redirect(route('owner.dashboard'));
                    }else{
                            //
                    }
                }
        }
    }
}

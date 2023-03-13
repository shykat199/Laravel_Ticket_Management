<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;

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
        //dd('kkk');
        if (!\Auth::check()){
            //Session::remove('error');
            Session::flash('error','Please LogIn First.');
        }
        if (! $request->expectsJson()) {
            return route('admin.login_page');
        }
    }
}

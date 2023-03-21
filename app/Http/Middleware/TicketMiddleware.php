<?php

namespace App\Http\Middleware;

use Closure;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class TicketMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        //dd($roles);
        if (Auth::check() && in_array(Auth::user()->user_role, $roles)) {

            return $next($request);
        }

        Auth::logout();
        return redirect()->route('admin.login')->with('error', 'Please Login First');
    }
}

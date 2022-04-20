<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;

class CheckStore
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
        $users = Company::all();
        if(count($users) > 0) {
            return $next($request);
        }
        else{
            return redirect()->route('accounts.setup.store');
        }
    }
}

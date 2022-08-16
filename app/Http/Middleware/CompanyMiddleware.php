<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Constants\UserType;

class CompanyMiddleware
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
        if(Auth::check() && !isWorker(Auth::id())){
            return $next($request); 
        }
        
        return redirect()->route('home');
    }
}

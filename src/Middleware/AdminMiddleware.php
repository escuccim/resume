<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
		if(Auth::check()) {    	
	    	if($request->user()->type == 1) {
	    		return $next($request);
	        } 
		}
		abort(404, 'Message');
// 		return redirect('/');
    }
}

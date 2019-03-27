<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\LogRequests;

class Log
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

        $auth_guard = "citizen";

        if(Auth::guard('government')->check()){
            $auth_guard = "government";
        }

    	$log_request = new LogRequests;
        $log_request->type = $auth_guard;
    	$log_request->user = (Auth::guest() ? 0 : Auth::user()->id);
    	$log_request->url = $request->fullUrl();
    	$log_request->save();

        return $next($request);
    }

}

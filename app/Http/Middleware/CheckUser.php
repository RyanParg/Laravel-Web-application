<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckUser
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
      if($request->route('user') == Auth::user()){
        return $next($request);
      }else{
        return response("You do not have the correct permissions to access this page!!");
      }
    }
}

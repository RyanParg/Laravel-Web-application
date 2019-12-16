<?php

namespace App\Http\Middleware;

use Closure;

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
        $authorizedName = $request->exists(Auth::user());
        if($authorizedName){
        return $next($request);
      }else{
        return response("NONONONONONONONONONON");
      }
    }
}

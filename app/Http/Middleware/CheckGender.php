<?php

namespace App\Http\Middleware;

use Closure;

class CheckGender
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
       if($request->gender == null && $request->old('gender') == null && $request->old('waliyy_wakeel') == null ) {
            
           return redirect()->action('GenderWaliController@getGender'); //redirect to controller if null gneder and waliyy, otherwise move on through app
        } 
       
       return $next($request);
    }
}

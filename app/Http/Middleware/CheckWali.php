<?php

namespace App\Http\Middleware;

use Closure;

class CheckWali
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
        if($request->gender == 'female' && $request->waliyy_wakeel == null) {
            return response()->view('checkwali');
            
        }
        elseif($request->gender == 'female' && $request->waliyy_wakeel == 'false') {
            //return redirect('/');
            return response('NO!');
        }
        return $next($request);
    }
}

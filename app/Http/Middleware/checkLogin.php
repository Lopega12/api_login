<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
class checkLogin
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
        $key = env('JWT_KEY');
        $decode = JWT::decode($request->getContent(),$key, array('HS256'));
        $decoded_array = (array) $decode;
        $request->attributes->add(['login'=>$decoded_array]);
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use App\User;
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
        try{
            $decode = JWT::decode($request->getContent(),$key, array('HS256'));
            $decoded_array = (array) $decode;
            //$request->attributes->add(['login'=>$decoded_array]);

            $state = User::find($decoded_array['email']);
            if(!emtpy($state)){
                print_r($state);
            }

        }catch(\Exception $e){
            return response($e->getMessage());
        }
        return $next($request);

    }
}

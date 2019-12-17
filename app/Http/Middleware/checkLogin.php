<?php

namespace App\Http\Middleware;

use App\Acceso;
use Closure;
use Firebase\JWT\JWT;

use App\User;
use Illuminate\Support\Facades\Log;
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
            $state = User::find($decoded_array['email']);
           if(!empty($state) && $state->password == $decoded_array['password']){
            $request->attributes->add(['user'=>$state]);
            }else{
               Log::alert("el email: ".$decoded_array['email']." ha intentado entrar");
           }

        }catch(\Exception $e){
            return response($e->getMessage());
        }

        return $next($request);

    }
}

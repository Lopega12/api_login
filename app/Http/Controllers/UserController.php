<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $r){
        $key = env('JWT_KEY');
        $decode = JWT::decode($r->getContent(),$key, array('HS256'));
        $decoded_array = (array) $decode;
        return $decoded_array;
    }
}
